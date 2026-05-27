<div class="col-md-4 col-lg-3 sidebar mb-4">
    <form id="search-form">
        <div class="card border-0 shadow p-4">
            <div class="mb-4">
                <h2>Keywords</h2>
                <input type="text" id="keywords" name="keywords" placeholder="Keywords" class="form-control">
            </div>

            <div class="mb-4">
                <h2>Location</h2>
                <input type="text" id="location" name="location" placeholder="Location" class="form-control">
            </div>

            <div class="mb-4">
                <h2>Category</h2>
                @include('components.job_category_select')
            </div>                   

            <div class="mb-4">
                <h2>Job Type</h2>
                <div class="form-check mb-2"> 
                    <input class="form-check-input" name="job_type[]" type="checkbox" value="Full Time" id="full_time">    
                    <label class="form-check-label" for="full_time">Full Time</label>
                </div>

                <div class="form-check mb-2"> 
                    <input class="form-check-input" name="job_type[]" type="checkbox" value="Part Time" id="part_time">    
                    <label class="form-check-label" for="part_time">Part Time</label>
                </div>

                <div class="form-check mb-2"> 
                    <input class="form-check-input" name="job_type[]" type="checkbox" value="Freelance" id="freelance">    
                    <label class="form-check-label" for="freelance">Freelance</label>
                </div>

                <div class="form-check mb-2"> 
                    <input class="form-check-input" name="job_type[]" type="checkbox" value="Remote" id="remote">    
                    <label class="form-check-label" for="remote">Remote</label>
                </div>
            </div>
        </div>
    </form>
</div>
