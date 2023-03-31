<div class="row d-flex flex-wrap flex-stack mb-6">
    <!--begin::Title-->
    <h3 class="fw-bolder my-2 text-right">نظرات
        <span class="fs-6 text-gray-400 fw-bold ms-1">(29)</span>
    </h3>
    <div class="separator mb-4 col-10"></div>
    <!--end::Title-->
    @if(!isset($comments) )
            <h3>.................</h3>
    @else
        <div class="card-body pt-3">
            <!--begin::Table container-->
            <div class="table-responsive">
                <!--begin::Table-->
                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                    <!--begin::Table head-->
                    <thead>
                    <tr class="border-0">
                        <th class="p-0 min-w-150px"></th>
                        <th class="p-0 min-w-100px"></th>
                        <th class="p-0 min-w-150px"></th>
                    </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>
                        @foreach($comments as $comment)
                            @php
                                $item = \App\Models\Comment::whereId($comment->favoritable_id)->first();
                            @endphp
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <!--begin::Name-->
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{$item->commentable->name}}</a>
                                    </div>
                                    <!--end::Name-->
                                </div>
                            </td>
                            <td class="text-end">
                                <a href="#" class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">{{$item->commentable->user->name}}</a>
                            </td>
                            <td class="text-muted fw-bold text-end">{{$item->body}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
            </div>
            <!--end::Table container-->
        </div>
    @endif
</div>


