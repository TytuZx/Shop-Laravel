@if (session('status'))
    <div class="row">
        <div class="col-12">
            <div class="alert alert-dismissable alert-success">
                <button type="button" class="close float-end" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                {{ session('status') }}
            </div>
        </div>
    </div>
@endif