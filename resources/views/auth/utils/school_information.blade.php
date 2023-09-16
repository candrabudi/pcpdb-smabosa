<div id="schoolInfoValidation" class="content">
    <div class="content-header">
        <h3 class="mb-1">Asal Sekolah</h3>
        <p>Lengkapi Data Asal Sekolah Kamu</p>
    </div>
    <div class="row gap-md-0 gap-3 my-6">
        <div class="col-sm-6">
            <label class="form-label" for="user_school_name">Asal sekolah</label>
            <input type="text" name="user_school_name" id="user_school_name" value="{{ old('user_school_name') }}" class="form-control" required />
        </div>
        <div class="col-sm-6">
            <label class="form-label" for="user_school_phone">Nomor Sekolah</label>
            <div class="input-group">
                <span class="input-group-text"><i class="ti ti-phone"></i></span>
                <input type="number" id="user_school_phone" name="user_school_phone" value="{{ old('user_school_phone') }}" class="form-control multi-steps-phone" placeholder="" maxlength="15"/>
            </div>
        </div>
        <div class="col-md-12">
            <label class="form-label" for="user_school_address">Alamat Sekolah</label>
            <input type="text" id="user_school_address" name="user_school_address" value="{{ old('user_school_address') }}" class="form-control" placeholder="" required/>
        </div>
        <div class="col-12 d-flex justify-content-between mt-4">
            <button class="btn btn-label-secondary btn-prev">
                <i class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i>
                <span class="align-middle d-sm-inline-block d-none">Kembali</span>
            </button>
            <button type="submit" class="btn btn-success btn-next btn-submit">Register</button>
        </div>
    </div>
</div>