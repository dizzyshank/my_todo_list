<script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
<script src="https://npmcdn.com/flatpickr/dist/l10n/ja.js"></script>
<script>
  flatpickr(document.getElementById('start_date'), {
    locale: 'ja',
    enableTime: true,
    dateFormat: "Y/m/d H:i",
    minDate: new Date()
  });
  flatpickr(document.getElementById('end_date'), {
    locale: 'ja',
    enableTime: true,
    dateFormat: "Y/m/d H:i",
    minDate: new Date()
  });
</script>