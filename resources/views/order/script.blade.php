<script>
    $(function(){
        const orderedList = []
        let total = 0
        $('.btn-add').on('click', function(){
            const name = $(this).closest('.card-body').find('.card-title').text()
            const price = Number($(this).closest('.card-body').find('h3').text())
            const id = $(this).closest('.card-body').find('.id_product').val()
            
            if(orderedList.every(list => list.id != id)){
                let dataN = {'id' : id, 'name' : name, 'qty' : 1, 'price' : price}
                orderedList.push(dataN)
                let order = `
                <tr>
                <td>${name}</td>
                <td>1</td>
                <td>${price}</td>
                </tr>`
                $('#tbl-cart tbody').append(order)
            }else {
                const i = orderedList.findIndex(list => list.id == id)
                item[i].qty += 1
                item[i].price = item[i].qty * item[i].price
            }
        })
    })
</script>