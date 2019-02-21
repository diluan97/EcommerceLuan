<?php
use App\Models\Category;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Products\Product;
use App\Models\Products\ProductOrder;
use App\Models\Products\ProductVariant;
use App\Models\Slide;
use App\User;



Breadcrumbs::for('admin_products.index', function ($breadcrumbs) {
    $breadcrumbs->push('QL Sản Phẩm', route('admin_products.index'));
});

Breadcrumbs::for('search_products', function ($breadcrumbs) {
    $breadcrumbs->parent('admin_products.index');
    $breadcrumbs->push('Tìm  Kiếm Sản Phẩm  ' , route('search_products'));
});

Breadcrumbs::for('search_categories', function ($breadcrumbs) {
    $breadcrumbs->parent('admin_category.index');
    $breadcrumbs->push('Tìm  Kiếm Danh Mục  ', route('search_categories'));
});

Breadcrumbs::for('search_slides', function ($breadcrumbs) {
    $breadcrumbs->parent('admin_slide.index');
    $breadcrumbs->push('Tìm  Kiếm Slide  ', route('search_slides'));
});

Breadcrumbs::for('search_orders', function ($breadcrumbs) {
    $breadcrumbs->parent('admin_order.index');
    $breadcrumbs->push('Tìm  Kiếm Đơn Hàng ', route('search_orders'));
});

Breadcrumbs::for('admin_products.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin_products.index');
    $breadcrumbs->push('Chỉnh Sửa Thông Tin  ' . Product::find($id)->name, route('admin_products.edit', $id));
});

Breadcrumbs::for('admin_product_variant.index', function ($breadcrumbs, $product_slug) {
    $product = Product::whereSlug($product_slug)->firstOrFail();
    $breadcrumbs->parent('admin_products.edit', $product->id);
    $breadcrumbs->push('QL Biến thể ' . $product->name, route('admin_product_variant.index', $product_slug));
});
Breadcrumbs::for('admin_product_variant.edit', function ($breadcrumbs, $product_slug, $id) {
    $product = Product::whereSlug($product_slug)->firstOrFail();
    $variant = ProductVariant::findOrFail($id);
    $breadcrumbs->parent('admin_products.edit', $product->id);
    $breadcrumbs->push('Chỉnh sửa thông tin biến thể');
});
Breadcrumbs::for('admin_category.index', function ($breadcrumbs) {
    $breadcrumbs->push('QL Danh Mục', route('admin_category.index'));
});

Breadcrumbs::for('admin_category.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin_products.index');
    $breadcrumbs->push('Chỉnh Sửa Thông Tin  ' . Category::find($id)->name, route('admin_category.edit', $id));
});

Breadcrumbs::for('admin_slide.index', function ($breadcrumbs) {
    $breadcrumbs->push('QL Slide', route('admin_slide.index'));
});

Breadcrumbs::for('admin_slide.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin_slide.index');
    $breadcrumbs->push('Chỉnh Sửa Thông Tin  ' . Slide::find($id)->name, route('admin_slide.edit', $id));
});
Breadcrumbs::for('admin_order.index', function ($breadcrumbs) {
    $breadcrumbs->push('QL Đơn Hàng', route('admin_order.index'));
});

Breadcrumbs::for('admin_order.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin_order.index');
    $breadcrumbs->push('Chỉnh Sửa Đơn Hàng  ' . Order::find($id)->name, route('admin_order.edit', $id));
});

Breadcrumbs::for('admin_users.index', function ($breadcrumbs) {
    $breadcrumbs->push('QL Người Dùng', route('admin_users.index'));
});

Breadcrumbs::for('admin_users.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin_users.index');
    $breadcrumbs->push('Thêm Người Dùng  ' , route('admin_users.create'));
});

Breadcrumbs::for('admin_users.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin_users.index');
    $breadcrumbs->push('Chỉnh Sửa Thông Tin  ' . User::find($id)->name, route('admin_users.edit', $id));
});
