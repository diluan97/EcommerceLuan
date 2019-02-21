<div>
    <div class="modal" id="searchModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('search') }}" method="GET">

                    <!-- Modal Header -->
                    <div class="modal-header ys-yellow-bg  ilv-bold ilv-fs-25">
                        <h4 class="modal-title">Tìm kiếm sản phẩm</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body" >
                        <input type="text" class="form-control"id="product_name"  name="product_name" placeholder="Nhập tên sản phẩm..." />
                    </div>

                    <div class="modal-body" id="product_list">
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary fa fa-search"></button>
                </form>
            </div>
        </div>
    </div>
</div>
@csrf
