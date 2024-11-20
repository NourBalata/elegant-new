
@if (session()->has('success'))

    <div id="my_alert_s" class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your <a href="#" class="alert-link">message</a> {{ session()->get('success') }}.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"> </span>
        </button>
    </div>

@endif
@if (session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> A <a href="#" class="alert-link">problem</a> {{ session()->get('error') }}.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"> </span>
        </button>
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

        <button type="button" class="btn-sm btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"> </span>
        </button>
    </div>
@endif
@if (session()->has('error'))
    <script>
        window.onload = function() {
            notif({
                msg: "لايمكن الوصول الى هذه الصفحة",
                type: "error"
            })
        }
    </script>
@endif
@if (session()->has('success'))
    <script>
        window.onload = function() {
            notif({
                msg: "تمت العملية بنجاح",
                type: "success"
            })
        }
    </script>
@endif

