<script>
    $(function(){
        const orderedList = []
        let total = 0
        const $submitBtn = $('#submit-order')
        const fmtRp = (n) => {
            try {
                return 'Rp ' + Number(n).toLocaleString('id-ID')
            } catch(e) {
                return n
            }
        }
        function refreshCartState(){
            const totalSum = orderedList.reduce((s, it) => s + Number(it.price), 0)
            $('#total-cell').text(fmtRp(totalSum))
            $('#order-payload').val(JSON.stringify({items: orderedList, total: totalSum, qty: orderedList.length}))
            $submitBtn.prop('disabled', orderedList.length === 0)
        }
        $submitBtn.prop('disabled', true)

        $('.btn-add').on('click', function(e){
            e.preventDefault()
            const $card = $(this).closest('.card-body')
            const name = $card.find('.card-title').text().trim()
            const price = Number($card.find('.id_product').data('price'))
            const id = Number($card.find('.id_product').val())
            
            if(orderedList.every(list => list.id != id)){
                let dataN = {'id' : id, 'name' : name, 'qty' : 1, 'unitPrice' : price, 'price' : price}
                orderedList.push(dataN)
                let order = `
                <tr data-id="${id}">
                <td>${name}</td>
                <td class="qty">1</td>
                <td class="price">${fmtRp(price)}</td>
                </tr>`
                $('#tbl-cart tbody').append(order)
            }else {
                const index = orderedList.findIndex(list => list.id == id)
                orderedList[index].qty += 1
                orderedList[index].price = orderedList[index].qty * orderedList[index].unitPrice
                const $row = $(`#tbl-cart tbody tr[data-id="${id}"]`)
                if($row.length){
                    $row.find('.qty').text(orderedList[index].qty)
                    $row.find('.price').text(fmtRp(orderedList[index].price))
                }
            }
            refreshCartState()
            console.log(orderedList)
        })
        $('#order-form').on('submit', function(e){
            if(orderedList.length === 0){
                e.preventDefault()
                alert('Keranjang belanja masih kosong!')
                return false
            }
        })
    })
</script>