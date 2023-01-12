<script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
  <script src="https://npmcdn.com/flatpickr/dist/l10n/ja.js"></script>
  <script>
    flatpickr(document.getElementById('start_date'), {
      locale: 'ja',
      dateFormat: "Y/m/d",
      minDate: new Date()
    });
    flatpickr(document.getElementById('end_date'), {
      locale: 'ja',
      dateFormat: "Y/m/d",
      minDate: new Date()
    });
  </script>