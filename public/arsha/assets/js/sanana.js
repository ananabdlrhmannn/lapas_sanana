document.addEventListener('DOMContentLoaded', function () {
  const newsSearch = document.getElementById('newsSearch');
  const newsItems = document.querySelectorAll('.news-item');

  if (newsSearch && newsItems.length) {
    newsSearch.addEventListener('input', function () {
      const keyword = this.value.toLowerCase().trim();

      newsItems.forEach(function (item) {
        const searchable = (item.getAttribute('data-search') || '').toLowerCase();
        item.style.display = searchable.includes(keyword) ? '' : 'none';
      });
    });
  }
});
