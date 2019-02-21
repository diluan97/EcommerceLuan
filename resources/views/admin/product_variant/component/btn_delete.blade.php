<button class="item"  data-placement="top" title="Xoá" data-toggle="modal" data-target="{{ '#delete' . $item->id }}">
    <i class="zmdi zmdi-delete"></i>
</button>
<form method="post" action="{!! $item->urlAdminDestroy($product->slug) !!}">
    <input type="hidden" name="_method" value="DELETE" /> {!! csrf_field() !!}
    <div class="modal fade" id="{{ 'delete' . $item->id }}" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content  -->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Cảnh báo</h4>
                    <label data-dismiss="modal" style="cursor: pointer;"><i class="fa fa-times"></i></label>
                </div>
                <div class="modal-body">
                    <p>Dữ liệu sẽ bị xóa vĩnh viễn. Các danh mục con và các sản phẩm thuộc danh mục này đều bị xóa.Bạn
                        có chắc là muốn như vậy?</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-danger active">Đồng ý</button>
                    <button type="button" class="btn btn-outline-brand active" data-dismiss="modal">Không đồng ý</button>
                </div>
            </div>
        </div>
    </div>
</form>
