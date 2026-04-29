<?php

namespace App\Services;

use App\Models\Visit;
use DateTimeInterface;
use Illuminate\Support\Str;

class VisitPdfGenerator
{
    private const PAGE_WIDTH = 595.28;
    private const PAGE_HEIGHT = 841.89;

    public function generate(Visit $visit): string
    {
        $content = new PdfCanvas;

        $content->setLineWidth(0.8);

        $content->text(56, 792, 'KEMENTERIAN IMIGRASI DAN PEMASYARAKATAN REPUBLIK INDONESIA', 10, 'F2');
        $content->text(56, 778, 'KANTOR WILAYAH DIREKTORAT JENDERAL PEMASYARAKATAN MALUKU UTARA', 9, 'F2');
        $content->text(56, 764, 'LEMBAGA PEMASYARAKATAN SANANA', 10, 'F2');
        $content->text(56, 750, 'JLN FOGI KEC. SANANA, KAB. KEPULAUAN SULA', 8.5, 'F1');

        $content->line(56, 735, 539, 735);
        $content->line(56, 732, 539, 732);

        $content->text(0, 710, 'SURAT IZIN KUNJUNGAN', 14, 'F2', 'center');

        $content->rect(420, 698, 119, 28);
        $content->text(431, 708, 'No Pendaftaran : '.$visit->id, 10, 'F2');

        $startY = 674;

        $this->field($content, 76, $startY, 'Nama Pengunjung', $visit->visitor_name);
        $this->field($content, 76, $startY - 16, 'NIK', $visit->nik);
        $this->field($content, 76, $startY - 32, 'No. Telepon', $visit->phone);
        $this->field($content, 76, $startY - 48, 'Email', $visit->email ?: '-');
        $this->field($content, 76, $startY - 64, 'Hubungan', $visit->relationship);

        $content->text(76, 582, 'Data Kunjungan', 10, 'F2');

        $content->table(
            76,
            566,
            [32, 145, 126, 84, 96],
            24,
            ['No', 'Tanggal Kunjungan', 'Sesi', 'Status', 'Keterangan'],
            [[
                '1',
                $this->formatDate($visit->visit_date),
                $visit->session ?: '-',
                Str::title((string) $visit->status),
                $this->shorten($visit->notes ?: '-', 28),
            ]]
        );

        $content->text(76, 496, 'Warga Binaan yang dikunjungi', 10, 'F2');

        $this->field($content, 76, 474, 'Nama', $visit->prisoner_name);
        $this->field($content, 76, 458, 'Perkara', '-');
        $this->field($content, 76, 442, 'Blok / Kamar Hunian', '-');

        $content->text(76, 398, 'Catatan:', 10, 'F2');

        $notes = $visit->notes ?: 'Harap membawa identitas asli saat melakukan kunjungan.';
        $y = 382;

        foreach ($this->wrap($notes, 82) as $line) {
            $content->text(76, $y, $line, 9.5, 'F1');
            $y -= 14;
        }

        $createdDate = $this->formatDate($visit->created_at ?: now());

        $content->text(360, 274, 'Kepulauan Sula, '.$createdDate, 10, 'F1');
        $content->text(383, 178, '(....................................)', 10, 'F1');
        $content->text(402, 164, 'Petugas Kunjungan', 9, 'F1');

        $content->text(76, 112, '* Kunjungan Tidak Dipungut Biaya', 9, 'F2');
        $content->text(76, 98, '* Simpan tautan PDF ini sebagai bukti pendaftaran kunjungan online.', 9, 'F1');

        return $this->buildPdf($content->output());
    }

    public function filename(Visit $visit): string
    {
        $name = Str::slug($visit->visitor_name ?: 'pengunjung');

        return 'surat-izin-kunjungan-'.$name.'-'.$visit->id.'.pdf';
    }

    private function field(PdfCanvas $content, float $x, float $y, string $label, mixed $value): void
    {
        $content->text($x, $y, $label, 10, 'F1');
        $content->text($x + 132, $y, ':', 10, 'F1');
        $content->text($x + 145, $y, $this->shorten((string) $value, 58), 10, 'F2');
    }

    private function formatDate(mixed $value): string
    {
        if ($value instanceof DateTimeInterface) {
            return $value->format('d-m-Y');
        }

        if (empty($value)) {
            return '-';
        }

        $timestamp = strtotime((string) $value);

        return $timestamp ? date('d-m-Y', $timestamp) : (string) $value;
    }

    private function shorten(string $text, int $limit): string
    {
        $clean = trim(preg_replace('/\s+/', ' ', $text) ?: '');

        if (function_exists('mb_strlen') && mb_strlen($clean) > $limit) {
            return mb_substr($clean, 0, $limit - 3).'...';
        }

        if (! function_exists('mb_strlen') && strlen($clean) > $limit) {
            return substr($clean, 0, $limit - 3).'...';
        }

        return $clean;
    }

    private function wrap(string $text, int $characters): array
    {
        $wrapped = wordwrap(trim(preg_replace('/\s+/', ' ', $text) ?: ''), $characters, "\n", true);

        return array_values(array_filter(explode("\n", $wrapped)));
    }

    private function buildPdf(string $pageContent): string
    {
        $objects = [];

        $objects[] = '<< /Type /Catalog /Pages 2 0 R >>';

        $objects[] = '<< /Type /Pages /Kids [3 0 R] /Count 1 >>';

        $objects[] = '<< /Type /Page /Parent 2 0 R /MediaBox [0 0 '.self::PAGE_WIDTH.' '.self::PAGE_HEIGHT.'] /Resources << /Font << /F1 4 0 R /F2 5 0 R >> >> /Contents 6 0 R >>';

        $objects[] = '<< /Type /Font /Subtype /Type1 /BaseFont /Helvetica >>';

        $objects[] = '<< /Type /Font /Subtype /Type1 /BaseFont /Helvetica-Bold >>';

        $objects[] = '<< /Length '.strlen($pageContent).' >>'."\nstream\n".$pageContent."\nendstream";

        $pdf = "%PDF-1.4\n%\xE2\xE3\xCF\xD3\n";
        $offsets = [];

        foreach ($objects as $index => $object) {
            $offsets[] = strlen($pdf);
            $number = $index + 1;

            $pdf .= $number." 0 obj\n".$object."\nendobj\n";
        }

        $xrefOffset = strlen($pdf);

        $pdf .= "xref\n0 ".(count($objects) + 1)."\n";
        $pdf .= "0000000000 65535 f \n";

        foreach ($offsets as $offset) {
            $pdf .= sprintf('%010d 00000 n ', $offset)."\n";
        }

        $pdf .= "trailer\n<< /Size ".(count($objects) + 1)." /Root 1 0 R >>\n";
        $pdf .= "startxref\n".$xrefOffset."\n%%EOF";

        return $pdf;
    }
}

class PdfCanvas
{
    private array $commands = [];

    public function text(float $x, float $y, string $text, float $size = 10, string $font = 'F1', string $align = 'left'): void
    {
        $safe = $this->escape($text);
        $textWidth = strlen($this->toPdfText($text)) * $size * 0.48;

        if ($align === 'center') {
            $x = (595.28 - $textWidth) / 2;
        } elseif ($align === 'right') {
            $x -= $textWidth;
        }

        $this->commands[] = sprintf(
            'BT /%s %.2F Tf %.2F %.2F Td (%s) Tj ET',
            $font,
            $size,
            $x,
            $y,
            $safe
        );
    }

    public function line(float $x1, float $y1, float $x2, float $y2): void
    {
        $this->commands[] = sprintf('%.2F %.2F m %.2F %.2F l S', $x1, $y1, $x2, $y2);
    }

    public function rect(float $x, float $y, float $width, float $height): void
    {
        $this->commands[] = sprintf('%.2F %.2F %.2F %.2F re S', $x, $y, $width, $height);
    }

    public function setLineWidth(float $width): void
    {
        $this->commands[] = sprintf('%.2F w', $width);
    }

    public function table(float $x, float $topY, array $widths, float $rowHeight, array $headers, array $rows): void
    {
        $totalWidth = array_sum($widths);
        $rowCount = count($rows) + 1;
        $height = $rowCount * $rowHeight;

        $this->rect($x, $topY - $height, $totalWidth, $height);

        $currentX = $x;

        foreach ($widths as $width) {
            $this->line($currentX, $topY, $currentX, $topY - $height);
            $currentX += $width;
        }

        $this->line($currentX, $topY, $currentX, $topY - $height);

        for ($i = 1; $i < $rowCount; $i++) {
            $y = $topY - ($i * $rowHeight);
            $this->line($x, $y, $x + $totalWidth, $y);
        }

        $this->writeRow($x, $topY - 16, $widths, $headers, 'F2');

        foreach ($rows as $index => $row) {
            $this->writeRow($x, $topY - (($index + 1) * $rowHeight) - 16, $widths, $row, 'F1');
        }
    }

    private function writeRow(float $x, float $y, array $widths, array $cells, string $font): void
    {
        $currentX = $x;

        foreach ($cells as $index => $cell) {
            $this->text($currentX + 6, $y, $cell, 8.5, $font);
            $currentX += $widths[$index] ?? 0;
        }
    }

    public function output(): string
    {
        return implode("\n", $this->commands)."\n";
    }

    private function escape(string $text): string
    {
        return str_replace(['\\', '(', ')'], ['\\\\', '\\(', '\\)'], $this->toPdfText($text));
    }

    private function toPdfText(string $text): string
    {
        if (function_exists('iconv')) {
            $converted = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $text);

            if ($converted !== false) {
                return $converted;
            }
        }

        return preg_replace('/[^\x20-\x7E]/', '', $text) ?: '';
    }
}
