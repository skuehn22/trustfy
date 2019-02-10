<h5 class="pt-3">Milestone Payment Plan</h5>
<table id="myTable" class=" table order-list">
    <thead>
    <tr>
        <td>Name</td>
        <td>Amount</td>
        <td>Due Date</td>
        <td>Description</td>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td class="col-sm-3 col-lg-3" style="width: 20%">
            <input type="text" name="name[]" class="form-control" />
        </td>
        <td class="col-sm-3 col-lg-3" style="width: 17%">
            <input type="number" name="amount[]"  class="form-control"/>
        </td>
        <td class="col-sm-2 col-lg-2" style="width: 17%">
            <input type="text" name="due_date[]"  id="due_date" class="form-control"/>
        </td>
        <td class="col-sm-2 col-lg-2" style="width: 26%">
            <textarea class="form-control" rows="3"  name="description"></textarea>
        </td>
        <td class="col-sm-2" style="width: 20%"><a class="deleteRow"></a>

        </td>
    </tr>
    </tbody>
    <tfoot>
    <tr>
        <td colspan="4" style="text-align: left;">
            <input type="button" class="btn btn-lg btn-classic btn-block " id="addrow" value="Add Row" />
        </td>
    </tr>
    <tr>
    </tr>
    </tfoot>
</table>
