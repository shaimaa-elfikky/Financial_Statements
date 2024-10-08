@extends('admin.master')

@section('title' ,__('keywords.index'))
@section('content')


    <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <div class="row align-items-center mb-2">
                <div class="col">
                  <h2 class="h5 page-title">{{__('keywords.welcome')}}</h2>
                </div>
                <div class="col-auto">
                  <form class="form-inline">
                    <div class="form-group d-none d-lg-inline">
                      <label for="reportrange" class="sr-only">Date Ranges</label>
                      <div id="reportrange" class="px-2 py-2 text-muted">
                        <span class="small"></span>
                      </div>
                    </div>
                    <div class="form-group">
                      <button type="button" class="btn btn-sm"><span class="fe fe-refresh-ccw fe-16 text-muted"></span></button>
                      <button type="button" class="btn btn-sm mr-2"><span class="fe fe-filter fe-16 text-muted"></span></button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="mb-2 align-items-center">
                <div class="card shadow mb-4">
                  <div class="card-body">
                    <div class="row mt-1 align-items-center">
                      <div class="col-12 col-lg-4 text-left pl-4">
                        <p class="mb-1 small text-muted">Balance</p>
                        <span class="h3">$12,600</span>
                        <span class="small text-muted">+20%</span>
                        <span class="fe fe-arrow-up text-success fe-12"></span>
                        <p class="text-muted mt-2"> Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui </p>
                      </div>
                      <div class="col-6 col-lg-2 text-center py-4">
                        <p class="mb-1 small text-muted">Today</p>
                        <span class="h3">$2600</span><br />
                        <span class="small text-muted">+20%</span>
                        <span class="fe fe-arrow-up text-success fe-12"></span>
                      </div>
                      <div class="col-6 col-lg-2 text-center py-4 mb-2">
                        <p class="mb-1 small text-muted">Goal Value</p>
                        <span class="h3">$260</span><br />
                        <span class="small text-muted">+6%</span>
                        <span class="fe fe-arrow-up text-success fe-12"></span>
                      </div>
                      <div class="col-6 col-lg-2 text-center py-4">
                        <p class="mb-1 small text-muted">Completions</p>
                        <span class="h3">26</span><br />
                        <span class="small text-muted">+20%</span>
                        <span class="fe fe-arrow-up text-success fe-12"></span>
                      </div>
                      <div class="col-6 col-lg-2 text-center py-4">
                        <p class="mb-1 small text-muted">Conversion</p>
                        <span class="h3">6%</span><br />
                        <span class="small text-muted">-2%</span>
                        <span class="fe fe-arrow-down text-danger fe-12"></span>
                      </div>
                    </div>
                    <div class="chartbox mr-4">
                      <div id="areaChart"></div>
                    </div>
                  </div> <!-- .card-body -->
                </div> <!-- .card -->
              </div>
              <div class="row items-align-baseline">
                <div class="col-md-12 col-lg-4">
                  <div class="card shadow eq-card mb-4">
                    <div class="card-body mb-n3">
                      <div class="row items-align-baseline h-100">
                        <div class="col-md-6 my-3">
                          <p class="mb-0"><strong class="mb-0 text-uppercase text-muted">Earning</strong></p>
                          <h3>$2,562</h3>
                          <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                        <div class="col-md-6 my-4 text-center">
                          <div lass="chart-box mx-4">
                            <div id="radialbarWidget"></div>
                          </div>
                        </div>
                        <div class="col-md-6 border-top py-3">
                          <p class="mb-1"><strong class="text-muted">Cost</strong></p>
                          <h4 class="mb-0">108</h4>
                          <p class="small text-muted mb-0"><span>37.7% Last week</span></p>
                        </div> <!-- .col -->
                        <div class="col-md-6 border-top py-3">
                          <p class="mb-1"><strong class="text-muted">Revenue</strong></p>
                          <h4 class="mb-0">1168</h4>
                          <p class="small text-muted mb-0"><span>-18.9% Last week</span></p>
                        </div> <!-- .col -->
                      </div>
                    </div> <!-- .card-body -->
                  </div> <!-- .card -->
                </div> <!-- .col -->
                <div class="col-md-12 col-lg-4">
                  <div class="card shadow eq-card mb-4">
                    <div class="card-body">
                      <div class="chart-widget mb-2">
                        <div id="radialbar"></div>
                      </div>
                      <div class="row items-align-center">
                        <div class="col-4 text-center">
                          <p class="text-muted mb-1">Cost</p>
                          <h6 class="mb-1">$1,823</h6>
                          <p class="text-muted mb-0">+12%</p>
                        </div>
                        <div class="col-4 text-center">
                          <p class="text-muted mb-1">Revenue</p>
                          <h6 class="mb-1">$6,830</h6>
                          <p class="text-muted mb-0">+8%</p>
                        </div>
                        <div class="col-4 text-center">
                          <p class="text-muted mb-1">Earning</p>
                          <h6 class="mb-1">$4,830</h6>
                          <p class="text-muted mb-0">+8%</p>
                        </div>
                      </div>
                    </div> <!-- .card-body -->
                  </div> <!-- .card -->
                </div> <!-- .col -->
                <div class="col-md-12 col-lg-4">
                  <div class="card shadow eq-card mb-4">
                    <div class="card-body">
                      <div class="d-flex mt-3 mb-4">
                        <div class="flex-fill pt-2">
                          <p class="mb-0 text-muted">Total</p>
                          <h4 class="mb-0">108</h4>
                          <span class="small text-muted">+37.7%</span>
                        </div>
                        <div class="flex-fill chart-box mt-n2">
                          <div id="barChartWidget"></div>
                        </div>
                      </div> <!-- .d-flex -->
                      <div class="row border-top">
                        <div class="col-md-6 pt-4">
                          <h6 class="mb-0">108 <span class="small text-muted">+37.7%</span></h6>
                          <p class="mb-0 text-muted">Cost</p>
                        </div>
                        <div class="col-md-6 pt-4">
                          <h6 class="mb-0">1168 <span class="small text-muted">-18.9%</span></h6>
                          <p class="mb-0 text-muted">Revenue</p>
                        </div>
                      </div> <!-- .row -->
                    </div> <!-- .card-body -->
                  </div> <!-- .card -->
                </div> <!-- .col-md -->
              </div> <!-- .row -->
              <div class="row">


              </div> <!-- .row-->
            </div> <!-- .col-12 -->
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->
        <div class="modal fade modal-notif modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="defaultModalLabel">Notifications</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="list-group list-group-flush my-n3">
                  <div class="list-group-item bg-transparent">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <span class="fe fe-box fe-24"></span>
                      </div>
                      <div class="col">
                        <small><strong>Package has uploaded successfull</strong></small>
                        <div class="my-0 text-muted small">Package is zipped and uploaded</div>
                        <small class="badge badge-pill badge-light text-muted">1m ago</small>
                      </div>
                    </div>
                  </div>
                  <div class="list-group-item bg-transparent">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <span class="fe fe-download fe-24"></span>
                      </div>
                      <div class="col">
                        <small><strong>Widgets are updated successfull</strong></small>
                        <div class="my-0 text-muted small">Just create new layout Index, form, table</div>
                        <small class="badge badge-pill badge-light text-muted">2m ago</small>
                      </div>
                    </div>
                  </div>
                  <div class="list-group-item bg-transparent">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <span class="fe fe-inbox fe-24"></span>
                      </div>
                      <div class="col">
                        <small><strong>Notifications have been sent</strong></small>
                        <div class="my-0 text-muted small">Fusce dapibus, tellus ac cursus commodo</div>
                        <small class="badge badge-pill badge-light text-muted">30m ago</small>
                      </div>
                    </div> <!-- / .row -->
                  </div>
                  <div class="list-group-item bg-transparent">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <span class="fe fe-link fe-24"></span>
                      </div>
                      <div class="col">
                        <small><strong>Link was attached to menu</strong></small>
                        <div class="my-0 text-muted small">New layout has been attached to the menu</div>
                        <small class="badge badge-pill badge-light text-muted">1h ago</small>
                      </div>
                    </div>
                  </div> <!-- / .row -->
                </div> <!-- / .list-group -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Clear All</button>
              </div>
            </div>
          </div>
        </div>
    


@endsection




