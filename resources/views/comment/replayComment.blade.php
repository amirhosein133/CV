<div class="flex-lg-row-fluid me-0 me-lg-20 col-10">
<form class="position-relative mb-6 row" action="{{route('create.comment')}}" method="POST">
    @csrf
    <input type="hidden" name="parent_id" value="{{$comment->id}}">
    <input type="hidden" name="commentable_id" value="{{ $subject->id }}">
    <input type="hidden" name="commentable_type" value="{{ get_class($subject) }}">
    <div class=" d-flex flex-column mb-8">
    <textarea class="form-control border-0 p-0 pe-10 resize-none min-h-25px" data-kt-autosize="true"
              rows="1" placeholder="جواب کامنت" name="body"
              style="overflow: hidden; overflow-wrap: break-word; height: 25px;"></textarea>
    </div>
    <!--edit::Reply input-->
    <button type="submit" class="btn btn-dark " id="kt_careers_submit_button">
        <!--begin::Indicator-->
        <span class="indicator-label">ثبت کامنت</span>
    </button>
</form>
</div>
