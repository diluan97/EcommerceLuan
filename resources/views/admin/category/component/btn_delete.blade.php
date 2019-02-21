<button class="item"  data-placement="top" title="Xoá" data-toggle="modal" data-target="{{ '#delete' . $item->id }}">
    <i class="zmdi zmdi-delete"></i>
</button>

<div class="ilv-btn-group">
    <form action="{{ $item->urlAdminDestroy() }}" method="post">

        <input type="hidden" name="_method" value="DELETE">
        {!! csrf_field() !!}
        <div class="modal fade" id="{{ 'delete' . $item->id }}" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content  -->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Cảnh báo</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Dữ liệu sẽ bị xóa vĩnh viễn.Bạn có chắc là muốn như vậy?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-danger active">Đồng ý</button>
                        <button type="button" class="btn btn-outline-brand active" data-dismiss="modal">Không đồng ý</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
