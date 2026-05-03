<?php $__env->startSection('title', 'Data Kunjungan | Admin Lapas Sanana'); ?>
<?php $__env->startSection('page_heading', 'Manajemen Kunjungan'); ?>

<?php $__env->startSection('content'); ?>
<div class="panel-card p-4">
    <div class="mb-4">
        <h4 class="mb-1">Data Pendaftaran Kunjungan</h4>
        <p class="text-muted mb-0">
            Kelola status pendaftaran kunjungan yang masuk dari halaman publik, lihat PDF,
            dan kirim tautan PDF ke WhatsApp pengunjung.
        </p>
    </div>

    <div class="alert alert-info border-0 rounded-4 mb-4">
        <div class="fw-semibold mb-1">
            <i class="bi bi-info-circle me-1"></i> Catatan pengiriman WhatsApp
        </div>

        <div class="small mb-0">
            Tombol WhatsApp akan membuka chat ke nomor pengunjung berisi pesan dan tautan PDF.
            Pastikan nilai <code>APP_URL</code> di file <code>.env</code> sudah memakai domain website aktif.
        </div>
    </div>

    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Pengunjung</th>
                    <th>Kontak</th>
                    <th>Warga Binaan</th>
                    <th>Jadwal</th>
                    <th>Status</th>
                    <th style="min-width: 340px;">Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $visits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $visit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php
                        $pdfUrl = \Illuminate\Support\Facades\URL::signedRoute('visits.pdf', $visit);

                        $visitDate = optional($visit->visit_date)->format('d-m-Y') ?: '-';

                        $whatsappMessage = "Halo {$visit->visitor_name}, berikut file PDF surat izin kunjungan Lapas Sanana.\n\n".
                            "Nama Pengunjung: {$visit->visitor_name}\n".
                            "NIK: {$visit->nik}\n".
                            "Warga Binaan: {$visit->prisoner_name}\n".
                            "Tanggal Kunjungan: {$visitDate}\n".
                            "Sesi: ".($visit->session ?: '-')."\n".
                            "Status: ".ucfirst($visit->status)."\n\n".
                            "Link PDF: {$pdfUrl}\n\n".
                            "Terima kasih.";

                        $whatsappUrl = $visit->whatsapp_number
                            ? 'https://wa.me/'.$visit->whatsapp_number.'?text='.rawurlencode($whatsappMessage)
                            : null;
                    ?>

                    <tr>
                        <td><?php echo e($visits->firstItem() + $loop->index); ?></td>

                        <td>
                            <div class="fw-semibold"><?php echo e($visit->visitor_name); ?></div>
                            <small class="text-muted">NIK: <?php echo e($visit->nik); ?></small>
                        </td>

                        <td>
                            <div><?php echo e($visit->phone); ?></div>
                            <small class="text-muted"><?php echo e($visit->email ?: '-'); ?></small>
                        </td>

                        <td>
                            <div class="fw-semibold"><?php echo e($visit->prisoner_name); ?></div>
                            <small class="text-muted"><?php echo e($visit->relationship); ?></small>
                        </td>

                        <td>
                            <div><?php echo e($visitDate); ?></div>
                            <small class="text-muted">Sesi: <?php echo e($visit->session ?: '-'); ?></small>
                        </td>

                        <td>
                            <span class="badge <?php echo e(match($visit->status) {
                                'diterima' => 'bg-success-subtle text-success',
                                'ditolak' => 'bg-danger-subtle text-danger',
                                'selesai' => 'bg-primary-subtle text-primary',
                                default => 'bg-warning-subtle text-warning'
                            }); ?> px-3 py-2 rounded-pill">
                                <?php echo e(ucfirst($visit->status)); ?>

                            </span>
                        </td>

                        <td>
                            <form action="<?php echo e(route('admin.visits.update-status', $visit)); ?>" method="POST" class="d-flex gap-2 mb-2">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PATCH'); ?>

                                <select name="status" class="form-select form-select-sm">
                                    <option value="menunggu" <?php if($visit->status === 'menunggu'): echo 'selected'; endif; ?>>
                                        Menunggu
                                    </option>

                                    <option value="diterima" <?php if($visit->status === 'diterima'): echo 'selected'; endif; ?>>
                                        Diterima
                                    </option>

                                    <option value="ditolak" <?php if($visit->status === 'ditolak'): echo 'selected'; endif; ?>>
                                        Ditolak
                                    </option>

                                    <option value="selesai" <?php if($visit->status === 'selesai'): echo 'selected'; endif; ?>>
                                        Selesai
                                    </option>
                                </select>

                                <button class="btn btn-primary btn-sm">
                                    Update
                                </button>
                            </form>

                            <div class="d-flex flex-wrap gap-2">
                                <a href="<?php echo e($pdfUrl); ?>" target="_blank" rel="noopener" class="btn btn-outline-danger btn-sm">
                                    <i class="bi bi-file-earmark-pdf me-1"></i>
                                    Lihat PDF
                                </a>

                                <?php if($whatsappUrl): ?>
                                    <a href="<?php echo e($whatsappUrl); ?>" target="_blank" rel="noopener" class="btn btn-success btn-sm">
                                        <i class="bi bi-whatsapp me-1"></i>
                                        Kirim WhatsApp
                                    </a>
                                <?php else: ?>
                                    <button type="button" class="btn btn-success btn-sm" disabled>
                                        <i class="bi bi-whatsapp me-1"></i>
                                        Nomor tidak valid
                                    </button>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="7" class="text-center py-5 text-muted">
                            Belum ada data kunjungan.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="mt-4 d-flex justify-content-center">
        <?php echo e($visits->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\CPNS\LATSAR\sistem\lapas-sanana\resources\views/admin/visits/index.blade.php ENDPATH**/ ?>