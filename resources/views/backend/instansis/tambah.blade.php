{!! Form::open(array('id' => 'frmOji', 'route' => [$halaman->kode.'.store'], 'class' => 'form account-form', 'method' => 'post', 'files' => 'true')) !!}
<div class="row">
    <div class="col-md-12">

		<p>
			{!! Form::label('nama', 'Masukkan Nama', ['class'=>'control-label']) !!}
			{!! Form::text('nama', null, array('id' => 'nama', 'class' => 'form-control', 'autocomplete' => 'off')) !!}
		</p>
		<p>
			{!! Form::label('logo_instansi', 'Upload Logo (Dimensi : 163 x 100)', array('class' => 'control-label')) !!}
			{!! Form::file('logo_instansi', null, array('id' => 'logo_instansi', 'class' => 'form-control')) !!}
		</p>
		<p>
			{!! Form::label('alamat', 'Masukkan Alamat', ['class'=>'control-label']) !!}
			{!! Form::textarea('alamat', null, array('id' => 'nama', 'class' => 'form-control', 'autocomplete' => 'off')) !!}
		</p>
		<p>
			{!! Form::label('telepon', 'Masukkan Telepon', ['class'=>'control-label']) !!}
			{!! Form::text('telepon', null, array('id' => 'nama', 'class' => 'form-control', 'autocomplete' => 'off')) !!}
		</p>
		<p>
			{!! Form::label('tracking', 'Masukkan Tracking', ['class'=>'control-label']) !!}
			{!! Form::text('tracking', null, array('id' => 'nama', 'class' => 'form-control', 'autocomplete' => 'off')) !!}
		</p>
		<p>
			{!! Form::label('email', 'Masukkan Email', ['class'=>'control-label']) !!}
			{!! Form::text('email', null, array('id' => 'nama', 'class' => 'form-control', 'autocomplete' => 'off')) !!}
		</p>
		<p>
			{!! Form::label('website', 'Masukkan Website', ['class'=>'control-label']) !!}
			{!! Form::text('website', null, array('id' => 'nama', 'class' => 'form-control', 'autocomplete' => 'off')) !!}
		</p>
		<p>
			{!! Form::label('layanan', 'Masukkan Layanan', ['class'=>'control-label']) !!}
			{!! Form::textarea('layanan', null, array('id' => 'nama', 'class' => 'form-control js-summernote', 'autocomplete' => 'off')) !!}
		</p>
		<p>
			{!! Form::label('dasarhukum', 'Masukkan Dasarhukum', ['class'=>'control-label']) !!}
			{!! Form::textarea('dasarhukum', null, array('id' => 'nama', 'class' => 'form-control js-summernote', 'autocomplete' => 'off')) !!}
		</p>
		<p>
			{!! Form::label('persyaratan', 'Masukkan Persyaratan', ['class'=>'control-label']) !!}
			{!! Form::textarea('persyaratan', null, array('id' => 'nama', 'class' => 'form-control js-summernote', 'autocomplete' => 'off')) !!}
		</p>
		<p>
			{!! Form::label('waktudanbiaya', 'Masukkan Waktudanbiaya', ['class'=>'control-label']) !!}
			{!! Form::textarea('waktudanbiaya', null, array('id' => 'nama', 'class' => 'form-control js-summernote', 'autocomplete' => 'off')) !!}
		</p>
		<p>
			{!! Form::label('alur', 'Masukkan Alur', ['class'=>'control-label']) !!}
			{!! Form::textarea('alur', null, array('id' => 'nama', 'class' => 'form-control js-summernote', 'autocomplete' => 'off')) !!}
		</p>


    </div>
	{!! Form::hidden('table-list', 'datatable', array('id' => 'table-list')) !!}
</div>
<div class="row">
	<div class="col-md-12">
        <span class="pesan"></span>
        <div id="output"></div>
        <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                <div id="statustxt">0%</div>
            </div>
        </div>
	</div>
</div>
{!! Form::close() !!}
<style>
    .select2-container {
        z-index: 9999 !important;
    }
</style>
<script src="{{ URL::asset('resources/vendor/jquery/jquery.enc.js') }}"></script>
<script src="{{ URL::asset('resources/vendor/jquery/jquery.form.js') }}"></script>
<script src="{{ URL::asset(config('master.aplikasi.author').'/js/ajax_progress.js') }}"></script>
<script src="{{ URL::asset(config('master.aplikasi.author').'/'.$halaman->kode.'/'.\Auth::id().'/ajax.js') }}"></script>
<script src="{{ asset('backend/fromplugin/summernote/summernote.js') }}" async=""></script>
<script type="text/javascript">
    $('.modal-title').html('<span class="fa fa-edit"></span> Tambah {{$halaman->nama}}');
    $('.js-summernote').summernote({
        // toolbar: [['para', ['ul', 'ol']]],
        height: 200,
        dialogsInBody: true
    });
</script>