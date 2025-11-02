<script>
    let orderedList = [];

    $(function () {
        const $submitBtn = $('#submit-order');

        const fmtRp = (n) => {
            try {
                return 'Rp ' + Number(n).toLocaleString('id-ID');
            } catch (e) {
                return n;
            }
        };

        function refreshCartState() {
            const totalSum = orderedList.reduce((s, it) => s + Number(it.price), 0);
            $('#total-cell').text(fmtRp(totalSum));
            $('#order-payload').val(JSON.stringify({ items: orderedList, total: totalSum }));
            $submitBtn.prop('disabled', orderedList.length === 0);
        }

        $submitBtn.prop('disabled', true);

        // Ketika tombol Add ditekan
        $('.btn-add').on('click', function (e) {
            e.preventDefault();
            const $card = $(this).closest('.card-body');
            const name = $card.find('.card-title').text().trim();
            const price = Number($card.find('.id_product').data('price'));
            const id = Number($card.find('.id_product').val());

            const existing = orderedList.findIndex(item => item.id === id);
            if (existing === -1) {
                orderedList.push({
                    id,
                    name,
                    qty: 1,
                    unitPrice: price,
                    price
                });
                $('#tbl-cart tbody').append(`
                    <tr data-id="${id}">
                        <td>${name}</td>
                        <td class="qty">1</td>
                        <td class="price">${fmtRp(price)}</td>
                    </tr>
                `);
            } else {
                orderedList[existing].qty += 1;
                orderedList[existing].price = orderedList[existing].qty * orderedList[existing].unitPrice;
                const $row = $(`#tbl-cart tbody tr[data-id="${id}"]`);
                $row.find('.qty').text(orderedList[existing].qty);
                $row.find('.price').text(fmtRp(orderedList[existing].price));
            }

            refreshCartState();
        });

        // Saat Submit Order ditekan
        $('#order-form').on('submit', function (e) {
            if (orderedList.length === 0) {
                e.preventDefault();
                alert('Keranjang belanja masih kosong!');
                return false;
            }

            // Hitung ulang total dan isi input tersembunyi
            const totalSum = orderedList.reduce((s, it) => s + Number(it.price), 0);
            $('#order-payload').val(JSON.stringify({ items: orderedList, total: totalSum }));

            console.log('Form dikirim dengan payload:', $('#order-payload').val());
            // Biarkan form lanjut submit ke Laravel
        });
    });
</script>
