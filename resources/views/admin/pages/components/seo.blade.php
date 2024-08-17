        <h3 class="mb-2 mt-7 h6">Cấu hình SEO</h3>
        
        <div class="mb-3">
            <label for="meta_title" class="form-label">Tiêu đề SEO</label>
            <textarea name="meta_title" id="meta_title" rows="3" class="form-control">{{ $data->meta_title ?? old('meta_title') }}</textarea>
            {{-- <input name="meta_title" id="meta_title" value="{{ $data->meta_title ?? old('meta_title') }}" placeholder="Nhập tiêu đề SEO" type="text" class="form-control"> --}}
        </div>

        <div class="mb-3">
            <label for="meta_keyword" class="form-label">Từ khóa SEO</label>
            <input name="meta_keyword" id="meta_keyword" value="{{ $data->meta_keyword ?? old('meta_keyword') }}" placeholder="Nhập mô tả SEO" class="form-control tagify_vd" autofocus>
        </div>

        <div class="mb-3">
            <label for="meta_description" class="form-label">Mô Tả SEO</label>
            <textarea rows="7" name="meta_description" id="meta_description" placeholder="Nhập mô tả SEO" class="form-control">{{ $data->meta_description ?? old('meta_description') }}</textarea>
        </div>
