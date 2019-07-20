<div class="row">
    <div class="col-11 col-sm-11 col-md-6 col-lg-6">
        {{ $movies->onEachSide(1)->links() }}
    </div>

    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
        <form method="GET" action="/public/search">
        <div class="form-group">
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Search By Movie name, Director..."  aria-describedby="basic-addon2">

                <div class="input-group-append">
                    <button type="submit" class="input-group-text" id="basic-addon2"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
