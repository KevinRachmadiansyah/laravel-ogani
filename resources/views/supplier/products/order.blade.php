@include('supplier.template.header')
@include('supplier.template.sidebar')
@include('supplier.template.topbar')

<!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">All Orders</h3>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <div class="toggle-wrap nk-block-tools-toggle">
                                                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                                <div class="toggle-expand-content" data-content="pageMenu">
                                                    <ul class="nk-block-tools g-3">
                                                        <li class="nk-block-tools-opt d-none d-sm-block">
                                                            <a href="{{ url('/supplier/add') }}" class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Add Project</span></a>
                                                        </li>
                                                        <li class="nk-block-tools-opt d-block d-sm-none">
                                                            <a href="#" class="btn btn-icon btn-primary"><em class="icon ni ni-plus"></em></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div><!-- .toggle-wrap -->
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->

                                <div class="card card-preview">
                                    <div class="card-inner">
                                        <table class="datatable-init nowrap nk-tb-list is-separate" data-auto-responsive="false">
                                            <thead>

                                                <tr class="nk-tb-item nk-tb-head">
                                                    <th class="nk-tb-col nk-tb-col-check">
                                                        <div class="custom-control custom-control-sm custom-checkbox notext">
                                                            <input type="checkbox" class="custom-control-input" id="puid">
                                                            <label class="custom-control-label" for="puid"></label>
                                                        </div>
                                                    </th>
                                                    <th class="nk-tb-col tb-col-sm"><span>Name</span></th>
                                                    <th class="nk-tb-col"><span>Email</span></th>
                                                    <th class="nk-tb-col"><span>Address</span></th>
                                                    <th class="nk-tb-col"><span>Phone</span></th>
                                                    <th class="nk-tb-col"><span>Product</span></th>
                                                    <th class="nk-tb-col"><span>Quantity</span></th>
                                                    <th class="nk-tb-col"><span>Price</span></th>
                                                    <th class="nk-tb-col"><span>Payment Status</span></th>
                                                    <th class="nk-tb-col"><span>Delivery Status</span></th>
                                                    <th class="nk-tb-col"><span>Image</span></th>
                                                    <th class="nk-tb-col nk-tb-col-tools">
                                                        <ul class="nk-tb-actions gx-1 my-n1">
                                                            <li class="me-n1">
                                                                <div class="dropdown">
                                                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                    <div class="dropdown-menu dropdown-menu-end">
                                                                        <ul class="link-list-opt no-bdr">
                                                                            <li><a href="#"><em class="icon ni ni-edit"></em><span>Edit Selected</span></a></li>
                                                                            <li><a href="#"><em class="icon ni ni-trash"></em><span>Remove Selected</span></a></li>
                                                                            <li><a href="#"><em class="icon ni ni-bar-c"></em><span>Update Stock</span></a></li>
                                                                            <li><a href="#"><em class="icon ni ni-invest"></em><span>Update Price</span></a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </th>
                                                </tr><!-- .nk-tb-item -->

                                            </thead>

                                            <tbody>
                                                @foreach ($order as $order)
                                                <tr class="nk-tb-item">
                                                    <td class="nk-tb-col nk-tb-col-check">
                                                        <div class="custom-control custom-control-sm custom-checkbox notext">
                                                            <input type="checkbox" class="custom-control-input" id="puid1">
                                                            <label class="custom-control-label" for="puid1"></label>
                                                        </div>
                                                    </td>
                                                    <td class="nk-tb-col tb-col-sm" style="word-break: break-all">

                                                         {{ $order->name }}

                                                    </td>
                                                    <td class="nk-tb-col" style="word-break: break-all">
                                                        {{ $order->email }}
                                                    </td>
                                                    <td class="nk-tb-col" style="word-break: break-all">
                                                        {{ $order->address }}
                                                    </td>
                                                    <td class="nk-tb-col" style="word-break: break-all">
                                                        {{ $order->phone }}
                                                    </td>
                                                    <td class="nk-tb-col" style="word-break: break-all">
                                                        {{ $order->product_name }}
                                                    </td>
                                                    <td class="nk-tb-col" style="word-break: break-all">
                                                        {{ $order->quantity }}
                                                    </td>
                                                    <td class="nk-tb-col">
                                                        <span class="tb-sub">{{ $order->price }}</span>
                                                    </td>
                                                    <td class="nk-tb-col">
                                                        <span class="tb-sub">{{ $order->payment_status }}</span>
                                                    </td>
                                                    <td class="nk-tb-col">
                                                        <span class="tb-sub">{{ $order->delivery_status }}</span>
                                                    </td>
                                                    <td class="nk-tb-col">
                                                        {{-- <span class="tb-lead">{{ asset(.'images/'.$order->image) }}</span> --}}
                                                        <img src="{{ Storage::url($order->image) }}" width="50px" height="50px" alt="">
                                                    </td>
                                                    

                                                    <td class="nk-tb-col nk-tb-col-tools">
                                                        <ul class="nk-tb-actions gx-1 my-n1">
                                                            <li class="me-n1">
                                                                <div class="dropdown">
                                                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                    <div class="dropdown-menu dropdown-menu-end">
                                                                        <ul class="link-list-opt no-bdr">
                                                                            {{-- <li><a href="{{ url('products/edit', $order->id) }}"><em class="icon ni ni-edit"></em><span>Edit Product</span></a></li> --}}
                                                                            <li><a href="#"><em class="icon ni ni-eye"></em><span>View Product</span></a></li>
                                                                            <li><a href="#"><em class="icon ni ni-activity-round"></em><span>Product Orders</span></a></li>
                                                                            <form action="{{ route('delete.order', $order->id) }}" method="POST" onclick="return confirm('Anda ingin menghapus data ini?')">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            {{-- <li><a href="#"><em class="icon ni ni-trash"></em><span>Remove Product</span></a></li> --}}
                                                                            {{-- <input type="submit" class="btn btn-danger" placeholder="Remove Product"/> --}}
                                                                            <button type="submit" class="btn btn-danger">Remove Order</button>
                                                                        </form>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr><!-- .nk-tb-item -->
                                                @endforeach
                                        </tbody>

                                    </table>

                                </div>
                            </div>

@include('supplier.template.footer')

