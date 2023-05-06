<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ $data->name}}</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            .image {
                display: flex;
                justify-content: center;
                padding: 1rem 0;
            }

            .email-content > div {
                margin-bottom: 1rem;
                width: 50%;
                margin-right: auto!important;
                margin-left: auto!important;
            }

            .lable {
                padding-bottom: 0.8rem;
            }

            .form-label {
                margin-bottom: 0.5rem;
            }

            .input-content {
                margin-top: 0.5rem;
                display: block;
                width: 100%;
                padding: 0.375rem 0.75rem;
                font-size: 1rem;
                font-weight: 400;
                line-height: 1.5;
                color: #212529;
                background-color: #fff;
                background-clip: padding-box;
                border: 1px solid #dee2e6;
                appearance: none;
                border-radius: 0.375rem;
                transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
            }
        </style>
    </head>
    <body>
        <div class="image">
            <img src="{{asset('assets/admin/images/logo/GP2.png')}}" alt="LOGO">
        </div>
        <div class="email-content">
            <div>
                <label class="form-label">Name</label>
                <div class="input-content">{{$data->name}}</div>
            </div>
            <div>
                <label class="form-label">Email</label>
                <div class="input-content">{{$data->email}}</div>
            </div>
           <div>
             <label class="form-label">Phone</label>
             <div class="input-content">{{$data->phone}}</div>
           </div>
            <div>
                <label class="form-label">Subject</label>
                <div class="input-content">{{$data->description}}</div>
            </div>
            <div>
                <label class="form-label">Thank you</label>
            </div>
        </div>
       
        
        <script src="" async defer></script>
    </body>
</html>