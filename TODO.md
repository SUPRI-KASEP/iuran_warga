# TODO: Connect Transactions with Dues Categories and Resident Data

- [x] Fix TransaksiCon store method: Correct category lookup to use 'id_dc', remove duplicate Transaksi::create, auto-set jenis_transaksi from category->periode and jumlah from category->amount.
- [x] Update transaksi.blade.php: Add data-periode and data-amount to id_dc options, add JS for warga select to auto-set id_dc based on warga's id_dues_category, update JS for id_dc change to auto-fill jenis_transaksi and jumlah, make jumlah readonly.
- [x] Test the transaction creation flow: Select warga -> auto-select category -> auto-fill periode and nominal. (Server started at http://127.0.0.1:8000, but browser tool disabled for testing.)
