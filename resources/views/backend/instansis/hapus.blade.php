{!! Form::open(array('id' => 'frmOji', 'route' => [$halaman->kode.'.destroy', $data->id], 'class' => 'form account-form', 'method' => 'DELETE')) !!}
<div class="row">
	<div class="col-md-12">

		<p>
			<label class="control-label">Hapus data <strong>{{ $data->nama }}</strong>?</label>
		</p>
		<p>
			<label class="control-label">Hapus data <strong>{{ $data->alamat }}</strong>?</label>
		</p>
		<p>
			<label class="control-label">Hapus data <strong>{{ $data->telepon }}</strong>?</label>
		</p>
		<p>
			<label class="control-label">Hapus data <strong>{{ $data->tracking }}</strong>?</label>
		</p>
		<p>
			<label class="control-label">Hapus data <strong>{{ $data->email }}</strong>?</label>
		</p>
		<p>
			<label class="control-label">Hapus data <strong>{{ $data->website }}</strong>?</label>
		</p>
		<p>
			<label class="control-label">Hapus data <strong>{{ $data->layanan }}</strong>?</label>
		</p>
		<p>
			<label class="control-label">Hapus data <strong>{{ $data->dasarhukum }}</strong>?</label>
		</p>
		<p>
			<label class="control-label">Hapus data <strong>{{ $data->persyaratan }}</strong>?</label>
		</p>
		<p>
			<label class="control-label">Hapus data <strong>{{ $data->waktudanbiaya }}</strong>?</label>
		</p>
		<p>
			<label class="control-label">Hapus data <strong>{{ $data->alur }}</strong>?</label>
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
<script src="{{ URL::asset('resources/vendor/jquery/jquery.form.js') }}"></script>
<script src="{{ URL::asset(config('master.aplikasi.author').'/js/ajax_progress.js') }}"></script>
