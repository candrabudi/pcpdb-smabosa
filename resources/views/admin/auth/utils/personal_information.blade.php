<div id="personalInfoValidation" class="content">
    <div class="content-header mb-4">
        <h3 class="mb-1">Informasi Pribadi</h3>
        <p>Masukan Data Informasi Pribadi</p>
    </div>
    <div class="row g-3">
        <div class="col-sm-6">
            <label class="form-label" for="user_gender">Jenis Kelamin</label>
            <select id="user_gender" name="user_gender" class="form-select" data-allow-clear="true">
                <option value="">Pilih</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>
        <div class="col-sm-6">
            <label class="form-label" for="user_religion">Agama</label>
            <select id="user_religion" name="user_religion" class="form-select" data-allow-clear="true">
                <option value="">Pilih</option>
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option value="Katholik">Katholik</option>
                <option value="Protestan">Protestan</option>
                <option value="Budha">Budha</option>
                <option value="Hindu">Hindu</option>
            </select>
        </div>
        <div class="col-sm-6">
            <label class="form-label" for="user_birth_place">Tempat Lahir</label>
            <input type="text" id="user_birth_place" name="user_birth_place" value="{{ old('user_birth_place') }}" class="form-control"/>
        </div>
        <div class="col-sm-6">
            <label class="form-label" for="user_birth_date">Tanggal Lahir</label>
            <input type="text" class="form-control" name="user_birth_date" value="{{ old('user_birth_date') }}" placeholder="YYYY-MM-DD" id="flatpickr-date" />
        </div>
        <div class="col-sm-6">
            <label class="form-label" for="user_phone_number">Nomor Handphone</label>
            <div class="input-group">
                <span class="input-group-text"><i class="ti ti-phone"></i></span>
                <input type="text" id="user_phone_number" name="user_phone_number" value="{{ old('user_phone_number') }}" class="form-control multi-steps-phone-number" placeholder="" maxlength="15"/>
            </div>
        </div>
        <div class="col-sm-6">
            <label class="form-label" for="user_whatsapp_phone">Nomor Whatsapp</label>
            <div class="input-group">
                <span class="input-group-text"><i class="ti ti-brand-whatsapp"></i></span>
                <input type="text" id="user_whatsapp_phone" name="user_whatsapp_phone" value="{{ old('user_whatsapp_phone') }}" class="form-control multi-steps-whatsapp-phone" placeholder="" maxlength="15"/>
            </div>
        </div>
        <div class="col-md-12">
            <label class="form-label" for="user_address">Alamat</label>
            <input type="text" id="user_address" name="user_address" value="{{ old('user_address') }}" class="form-control" placeholder="" />
        </div>
        <div class="col-12 d-flex justify-content-between mt-4">
            <button class="btn btn-label-secondary btn-prev">
                <i class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i>
                <span class="align-middle d-sm-inline-block d-none">Kembali</span>
            </button>
            <a class="btn btn-primary btn-next text-white">
                <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Lanjut</span>
                <i class="ti ti-arrow-right ti-xs"></i>
            </a>
        </div>
    </div>
</div>