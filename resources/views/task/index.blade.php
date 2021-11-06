@extends('layouts.app')

@section('content')
    <div class="margin-wrapper">
        <div class="col-sm-12 tasks">
            <div class="task-list">
                <div class="row">
                    <div class="col-8">
                        <h1>Todo <button class="btn rounded btn-success "
                                style="border-radius: 50%; background-color: #4dbd74; border-color: #4dbd74;">Add</button>
                        </h1>
                    </div>
                    <div class="col-4">
                        <div class="input-group rounded">
                            <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                                aria-describedby="search-addon" />
                            <span class="input-group-text border-0" id="search-addon">
                                <i class="fas fa-search"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="priority high"><span>high priority</span></div>
                <div class="task high">
                    <div class="round">
                        <input type="checkbox" id="checkbox1" />
                        <label for="checkbox1"></label>
                    </div>
                    <div class="desc">
                        <div class="title">Lorem Ipsum</div>
                        <div>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci
                            velit
                        </div>
                    </div>
                    <div class="time">
                        <button class="btn btn-success btn-sm"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </div>
                <div class="task high">
                    <div class="round">
                        <input type="checkbox" id="checkbox2" />
                        <label for="checkbox2"></label>
                    </div>
                    <div class="desc">
                        <div class="title">Lorem Ipsum</div>
                        <div>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci
                            velit
                        </div>
                    </div>
                    <div class="time">
                        <button class="btn btn-success btn-sm"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </div>
                <div class="task high">
                    <div class="round">
                        <input type="checkbox" id="checkbox3" />
                        <label for="checkbox3"></label>
                    </div>
                    <div class="desc">
                        <div class="title">Lorem Ipsum</div>
                        <div>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci
                            velit
                        </div>
                    </div>
                    <div class="time">
                        <button class="btn btn-success btn-sm"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </div>
                <div class="task high last">
                    <div class="round">
                        <input type="checkbox" id="checkbox4" />
                        <label for="checkbox4"></label>
                    </div>
                    <div class="desc">
                        <div class="title">Lorem Ipsum</div>
                        <div>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci
                            velit
                        </div>
                    </div>
                    <div class="time">
                        <button class="btn btn-success btn-sm"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </div>

                <div class="priority medium"><span>medium priority</span></div>

                <div class="task medium">
                    <div class="round">
                        <input type="checkbox" id="checkbox3" />
                        <label for="checkbox3"></label>
                    </div>
                    <div class="desc">
                        <div class="title">Lorem Ipsum</div>
                        <div>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci
                            velit
                        </div>
                    </div>
                    <div class="time">
                        <button class="btn btn-success btn-sm"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </div>
                <div class="task medium last">
                    <div class="round">
                        <input type="checkbox" id="checkbox3" />
                        <label for="checkbox3"></label>
                    </div>
                    <div class="desc">
                        <div class="title">Lorem Ipsum</div>
                        <div>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci
                            velit
                        </div>
                    </div>
                    <div class="time">
                        <button class="btn btn-success btn-sm"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </div>

                <div class="priority low"><span>low priority</span></div>

                <div class="task low">
                    <div class="round">
                        <input type="checkbox" id="checkbox3" />
                        <label for="checkbox3"></label>
                    </div>
                    <div class="desc">
                        <div class="title">Lorem Ipsum</div>
                        <div>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci
                            velit
                        </div>
                    </div>
                    <div class="time">
                        <button class="btn btn-success btn-sm"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </div>

                <div class="task low">
                    <div class="round">
                        <input type="checkbox" id="checkbox3" />
                        <label for="checkbox3"></label>
                    </div>
                    <div class="desc">
                        <div class="title">Lorem Ipsum</div>
                        <div>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci
                            velit
                        </div>
                    </div>
                    <div class="time">
                        <button class="btn btn-success btn-sm"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </div>
                <div class="task low">
                    <div class="round">
                        <input type="checkbox" id="checkbox3" />
                        <label for="checkbox3"></label>
                    </div>
                    <div class="desc">
                        <div class="title">Lorem Ipsum</div>
                        <div>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci
                            velit
                        </div>
                    </div>
                    <div class="time">
                        <button class="btn btn-success btn-sm"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </div>
                <div class="task low">
                    <div class="round">
                        <input type="checkbox" id="checkbox3" />
                        <label for="checkbox3"></label>
                    </div>
                    <div class="desc">
                        <div class="title">Lorem Ipsum</div>
                        <div>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci
                            velit
                        </div>
                    </div>
                    <div class="time">
                        <button class="btn btn-success btn-sm"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </div>
                <div class="task low">
                    <div class="desc">
                        <div class="round">
                            <input type="checkbox" id="checkbox3" />
                            <label for="checkbox3"></label>
                        </div>
                        <div class="title">Lorem Ipsum</div>
                        <div>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci
                            velit
                        </div>
                    </div>
                    <div class="time">
                        <button class="btn btn-success btn-sm"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </div>
                <div class="task low">
                    <div class="round">
                        <input type="checkbox" class="checkbox" id="checkbox6" />
                        <label for="checkbox6"></label>
                    </div>
                    <div class="desc">
                        <div class="title">Lorem Ipsum</div>
                        <div>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci
                            velit
                        </div>
                    </div>
                    <div class="time">
                        <button class="btn btn-success btn-sm"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

@endsection
