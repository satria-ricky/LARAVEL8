<div class="visible-print text-center">
    <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(250)->mergeString(Storage::get('foto/logo_bank.png'))->generate($data)) !!} ">
</div>