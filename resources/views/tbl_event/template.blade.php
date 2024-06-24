@extends('layouts.admin')

@section('content')
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
                                    <option value="{{ $template->template_id }}" data-image="{{ asset($template->gambar_template) }}">{{ $template->nama_template }}</option>  
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Preview Template</label>
                            <div>
                                <img id="template-preview" src="{{ asset('path/to/default-template-image.png') }}" class="img-fluid rounded" style="width: 150px">
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

@section('scripts')
<script>
    document.getElementById('template_id').addEventListener('change', function() {
        var selectedTemplate = this.options[this.selectedIndex].getAttribute('data-image');
        console.log(selectedTemplate); // Tambahkan ini untuk memastikan path gambar benar
        document.getElementById('template-preview').src = selectedTemplate;
    });
</script>
@endsection
