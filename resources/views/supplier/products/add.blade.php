@include('supplier.template.header')
@include('supplier.template.sidebar')
@include('supplier.template.topbar')

<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="title nk-block-title">Validation - Regular Style</h4>
            <div class="nk-block-des">
                <p>Validating your form, just add the class <code class="code-class">.form-validate</code> to any <code class="code-tag">&lt;form&gt;</code>, then it validate the form show error message.</p>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-inner">
            <form action="{{ url('supplier/store') }}" method="POST" enctype="multipart/form-data" class="form-validate">
            @csrf
            @method('POST')
                <div class="row g-gs">
                <div class="col-md-12">

                    <div class="form-group">
                        <label class="form-label" for="fv-subject">Nama Produk</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="fv-subject" name="name" required>
                            </div>
                    </div>
                </div>
                <label class="form-label" for="fv-phone">Deskripsi Produk</label>
                            <div class="card">
                                <div class="card-inner">
                                    <textarea name="desc" id="desc" cols="153" rows="5" ></textarea>
                                </div>
                            </div>
                <div class="nk-block nk-block-lg">
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <label class="form-label">Unggah Gambar</label>
                                <div class="form-control-wrap">
                                    <div class="form-file">
                                        <div class="form-group">
                                            <label class="form-file-label" for="customFile">Choose file</label>
                                            <input type="file" class="form-file-input" id="customFile" name="image">
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="fv-phone">Quantity</label>
                        <div class="form-control-wrap">
                            <div class="input-group">
                                <input type="number" class="form-control" name="qty" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="fv-phone">Price</label>
                        <div class="form-control-wrap">
                            <div class="input-group">
                                <input type="number" class="form-control" name="price" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="fv-phone">Discount</label>
                        <div class="form-control-wrap">
                            <div class="input-group">
                                <input type="number" class="form-control" name="discount" required>
                            </div>
                        </div>
                    </div>
                </div>


                    <div class="col-md-12">
                                <button type="submit" class="btn btn-lg btn-primary"> Tambahkan Produk </button>
                            </form>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div><!-- .nk-block -->

@include('supplier.template.footer')
