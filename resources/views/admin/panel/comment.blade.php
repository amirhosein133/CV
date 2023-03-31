<div class="row g-5 g-xl-8 text-right">
    <div class="card-header">
        <!--begin::Heading-->
        <div class="card-title">
            <h3>کامنت های تایید نشده</h3>
        </div>
        <!--end::Heading-->
    </div>
    <div class="card-body p-0">
        <!--begin::Table wrapper-->
        <div class="table-responsive">
            <!--begin::Table-->
            <table class="table table-flush align-middle table-row-bordered table-row-solid gy-4" id="kt_security_license_usage_table">
                <!--begin::Thead-->
                <thead class="border-gray-200 fs-5 fw-bold bg-lighten">
                <tr>
                    <th class="w-200px ps-9">کاربر سازنده</th>
                    <th class="px-0 min-w-250px">متن پیام</th>
                    <th class="min-w-200px">رسیدگی</th>
                </tr>
                </thead>
                <!--end::Thead-->
                <!--begin::Tbody-->
                <tbody class="fw-6 fw-bold text-gray-600">
                @foreach($comments as $comment)
                    <tr>
                        <td class="ps-9">
                            {{$comment->user->name}}
                        </td>
                        <td class="ps-0">
                            {{$comment->body}}
                        </td>
                        <td class="ps-5">

                            <a href="#" class="btn btn-primary btn-sm ">رسیدگی</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <!--end::Tbody-->
            </table>
            <!--end::Table-->
        </div>
        <!--end::Table wrapper-->
    </div>
</div>
