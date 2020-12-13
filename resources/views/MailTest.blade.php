<!DOCTYPE html>
<html>
<head>
    <title>ItsolutionStuff.com</title>
</head>
<body>
    <h1>{{ $details['title'] }}</h1>
    <p>{{ $details['body'] }}</p>
    <br>
    {{-- <img class="img-thumbnail" src="{{ asset("/GeneratedQRs/qrcode.png") }}" width="150" height="150" style="margin-top: 20px"> --}}
    {{-- <img src="data:image/png;base64,{{base64_encode(file_get_contents(asset("/qrcode.png")))}}" alt=""> --}}
    @if($details['image'] == 1)
    <img src ="{{ $message->embed(public_path('/qrcode.png')) }}" width="400"/>
    @endif
    {{-- <br> --}}
    {{-- <a href="{{asset("/GeneratedQRs/qrcode.png")}}" class="btn btn-primary" download>Download</a> --}}

</body>
</html>
