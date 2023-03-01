@section("title")
	{{e2("Dashboard")}}
@endsection
<div class="row gutters-tiny">
                        <!-- Row #5 -->
                        <div class="col-md-6 col-xl-3">
                            <a class="block block-transparent" href="javascript:void(0)">
                                <div class="block-content block-content-full bg-primary">
                                    <div class="py-20 text-center">
                                        <div class="mb-20">

                                        <i class="material-symbols-outlined text-white font-size-h1">
                                            preview
                                            </i>
                                           
                                        </div>
                                        <div class="font-size-h3 font-w600 text-white">56</div>
                                        <div class="font-size-sm font-w600 text-uppercase text-primary-lighter">Under Preliminary Review</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <a class="block block-transparent" href="javascript:void(0)">
                                <div class="block-content block-content-full bg-warning">
                                    <div class="py-20 text-center">
                                        <div class="mb-20">
                                            <i class="si si-wallet fa-4x text-warning-light"></i>
                                        </div>
                                        <div class="font-size-h3 font-w600 text-white">56</div>
                                        <div class="font-size-sm font-w600 text-uppercase text-warning-light">Pending 
</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <a class="block block-transparent" href="javascript:void(0)">
                                <div class="block-content block-content-full bg-info">
                                    <div class="py-20 text-center">
                                        <div class="mb-20">
                                            <i class="si si-users fa-4x text-info-light"></i>
                                        </div>
                                        <div class="font-size-h3 font-w600 text-white">77</div>
                                        <div class="font-size-sm font-w600 text-uppercase text-info-light">Published </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <a class="block block-transparent" href="javascript:void(0)">
                                <div class="block-content block-content-full bg-success">
                                    <div class="py-20 text-center">
                                        <div class="mb-20">
                                            <i class="si si-briefcase fa-4x text-success-light"></i>
                                        </div>
                                        <div class="font-size-h3 font-w600 text-white">7</div>
                                        <div class="font-size-sm font-w600 text-uppercase text-warning-light">Accepted </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- END Row #5 -->
                    </div>
<div class="row">
    <?php 
    $k = 0;
    foreach(status() AS $s)  { 
      ?>
      {{col("col-md-4","$s Submissions",$k)}} 
       
      {{_col()}} 
     <?php $k++; } ?>
 
</div>