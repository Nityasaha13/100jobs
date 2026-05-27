<div class="modal fade" id="save-the-job" tabindex="-1" aria-labelledby="ApplyJob" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title pb-0" id="ApplyJob">Want to save this job?</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <form method="post" action="{{ route('save-job') }}" enctype="multipart/form-data">

                  @csrf
                  @method('post')

                  <div class="mb-3">
                      <div>
                          <input type="checkbox" id="save-yes" name="save" value="yes">
                          <label for="save-yes">Yes</label>
                      </div>
                  </div>
                  <div class="d-flex justify-content-end">
                    <input type="hidden" value="{{$job->id}}" name="job_id">
                    <button type="submit" class="btn btn-primary mx-3">Save</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </div>

              </form>
          </div>
      </div>
  </div>
</div>
