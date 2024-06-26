@extends('layouts.admin')

@section('content')

<nav class="navbar navbar-expand-lg navbar-light bg-white rounded mb-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">List Template</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>


<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <a href="{{ route('tbl_event.index') }}" class="btn btn-secondary mb-3">Kembali</a>
                    <h4 class="text-center">Pilih Template untuk Event: {{ $event->title }}</h4>
                    <form action="{{ route('tbl_event.saveTemplate', $event->event_id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="sss" id="sss" value="33">
                        <div class="form-group">
                            <label for="template_id" class="font-weight-bold">Template Design</label>
                            <select class="form-control" id="template_id" name="template_id">
                                @foreach($template_design as $template)
                                    <option value="{{ $template->template_id }}" data-image="{{ asset('storage/template_design/'). '/' . $template->gambar_template }}">{{ $template->nama_template }}</option>  
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Preview Template</label>
                            <div>
                                <img id="template-preview" src="{{ asset('sertifikatpendidikan.png') }}" class="img-fluid rounded" style="width: 450px">
                            </div>
                        </div>
                        <div class="text-left">
                            <button type="submit" class="btn btn-primary">SIMPAN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('template_id').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var dataImage = selectedOption.getAttribute('data-image');
            // var path = "{{ asset('storage/template_design/" + dataImage + "') }}";
            // console.log(dataImage);  // Cetak nilai data-image ke console
            document.getElementById('template-preview').src = dataImage;
            // Anda dapat melakukan hal lain dengan dataImage di sini
        });
    });
    // document.getElementById('template_id').addEventListener('change', function() {
    //     var selectedTemplate = this.options[this.selectedIndex].getAttribute('data-image');
    //     console.log(selectedTemplate); // Tambahkan ini untuk memastikan path gambar benar
    //     // document.getElementById('template-preview').src = selectedTemplate;
    // });
</script>
@endpush
