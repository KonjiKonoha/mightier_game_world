<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="theme-color" content="#000000" />
    <meta name="viewport" content="width=480,initial-scale=1, maximum-scale=1" />
    <title>Simple Slot Machine</title>
    <link rel="icon" href="{{ asset('simple/img/BAR.png') }}" />
    <script src="{{ asset('simple/js/helpers.js') }}"></script>
    <script src="{{ asset('simple/js/resource.loader.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('simple/css/style.css') }}" />
</head>

<body>
    <div class="container">
        <h2 class="text-center text-light my-3 gold"><i class="fab fa-phoenix-framework gold"></i> Slot Game</h2>
        <div class="row justify-content-center mb-3">
            <div class="col col-auto">
                <canvas id="slot" width="440" height="240"></canvas>
            </div>
        </div>
        <div class="row justify-content-center mb-3">
            <div class="col col-auto">
                <div class="input-group mb-3 w-75 m-auto">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Current WIN</span>
                    </div>
                    <input type="text" class="form-control w-auto" id="cwin" value="0" />
                </div>
            </div>
        </div>
        <div class="row justify-content-center mb-3">
            <div class="col col-auto">
                <button class="btn btn-danger px-5" id="spin"><i class="fas fa-sync-alt"></i> SPIN</button>
                <button class="btn btn-secondary px-5" id="auto"><i class="fab fa-android"></i> AUTO (OFF)</button>
            </div>
        </div>
        <div class="row justify-content-center mb-3">
            <div class="col col-auto">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Credits</span>
                    </div>
                    <input class="form-control" type="number" id="balance" min="1" max="5000" />
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-dollar-sign green"></i></span>
                    </div>
                </div>
            </div>
            <div class="col col-auto">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">BETx</span>
                    </div>
                    <input class="form-control" type="number" id="bet" min="1" value="1"
                        max="3" />
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-coins gold"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col col-auto">
                <select id="mode" class="btn btn-default">
                    <option value="random">Random</option>
                    <option value="fixed">Fixed</option>
                </select>
                <select id="where" class="btn btn-default">
                    <option value="top">top</option>
                    <option value="middle">middle</option>
                    <option value="bottom">bottom</option>
                </select>
                <select id="what" class="btn btn-default"></select>
            </div>
        </div>
        <div class="row justify-content-center my-3">
            <div class="col col-auto">
                <button class="btn btn-warning w-auto" type="button" id="checkout">
                    <i class="fas fa-money-bill-alt"></i> Exit
                </button>
                <button class="btn btn-primary w-auto" type="button" data-toggle="modal" data-target="#payTable">
                    <i class="fas fa-money-bill-alt"></i> Pay Table
                </button>
            </div>
        </div>
    </div>

    <!-- Paytable modal -->
    <div class="modal fade" id="payTable" tabindex="-1" role="dialog" aria-labelledby="payTableTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="payTableTitle">Pay Table</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-dark table-hover table-responsive">
                        <thead>
                            <tr>
                                <td>Reel1</td>
                                <td>Reel2</td>
                                <td>Reel3</td>
                                <td>TOP</td>
                                <td>MIDDLE</td>
                                <td>BOTTOM</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><img src="{{ asset('simple/img/Cherry.png') }}" width="40" /></td>
                                <td><img src="{{ asset('simple/img/Cherry.png') }}" width="40" /></td>
                                <td><img src="{{ asset('simple/img/Cherry.png') }}" width="40" /></td>
                                <td class="v-align">2000xBET</td>
                                <td class="v-align">1000xBET</td>
                                <td class="v-align">4000xBET</td>
                            </tr>
                            <tr>
                                <td><img src="{{ asset('simple/img/7.png') }}" width="40" /></td>
                                <td><img src="{{ asset('simple/img/7.png') }}" width="40" /></td>
                                <td><img src="{{ asset('simple/img/7.png') }}" width="40" /></td>
                                <td class="v-align">150xBET</td>
                                <td class="v-align">150xBET</td>
                                <td class="v-align">150xBET</td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="{{ asset('simple/img/7.png') }}" width="40" />
                                    <img src="{{ asset('simple/img/Cherry.png') }}" width="40" />
                                </td>
                                <td>
                                    <img src="{{ asset('simple/img/7.png') }}" width="40" />
                                    <img src="{{ asset('simple/img/Cherry.png') }}" width="40" />
                                </td>
                                <td>
                                    <img src="{{ asset('simple/img/7.png') }}" width="40" />
                                    <img src="{{ asset('simple/img/Cherry.png') }}" width="40" />
                                </td>
                                <td class="v-align">75xBET</td>
                                <td class="v-align">75xBET</td>
                                <td class="v-align">75xBET</td>
                            </tr>
                            <tr>
                                <td><img src="{{ asset('simple/img/3xBAR.png') }}" width="40" /></td>
                                <td><img src="{{ asset('simple/img/3xBAR.png') }}" width="40" /></td>
                                <td><img src="{{ asset('simple/img/3xBAR.png') }}" width="40" /></td>
                                <td class="v-align">50xBET</td>
                                <td class="v-align">50xBET</td>
                                <td class="v-align">50xBET</td>
                            </tr>
                            <tr>
                                <td><img src="{{ asset('simple/img/2xBAR.png') }}" width="40" /></td>
                                <td><img src="{{ asset('simple/img/2xBAR.png') }}" width="40" /></td>
                                <td><img src="{{ asset('simple/img/2xBAR.png') }}" width="40" /></td>
                                <td class="v-align">20xBET</td>
                                <td class="v-align">20xBET</td>
                                <td class="v-align">20xBET</td>
                            </tr>
                            <tr>
                                <td><img src="{{ asset('simple/img/BAR.png') }}" width="40" /></td>
                                <td><img src="{{ asset('simple/img/BAR.png') }}" width="40" /></td>
                                <td><img src="{{ asset('simple/img/BAR.png') }}" width="40" /></td>
                                <td class="v-align">10xBET</td>
                                <td class="v-align">10xBET</td>
                                <td class="v-align">10xBET</td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="{{ asset('simple/img/BAR.png') }}" width="40" />
                                    <img src="{{ asset('simple/img/2xBAR.png') }}" width="40" />
                                    <img src="{{ asset('simple/img/3xBAR.png') }}" width="40" />
                                </td>
                                <td>
                                    <img src="{{ asset('simple/img/BAR.png') }}" width="40" />
                                    <img src="{{ asset('simple/img/2xBAR.png') }}" width="40" />
                                    <img src="{{ asset('simple/img/3xBAR.png') }}" width="40" />
                                </td>
                                <td>
                                    <img src="{{ asset('simple/img/BAR.png') }}" width="40" />
                                    <img src="{{ asset('simple/img/2xBAR.png') }}" width="40" />
                                    <img src="{{ asset('simple/img/3xBAR.png') }}" width="40" />
                                </td>
                                <td class="v-align">5xBET</td>
                                <td class="v-align">5xBET</td>
                                <td class="v-align">5xBET</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('simple/js/reel.js') }}"></script>
    <script src="{{ asset('simple/js/slot.js') }}"></script>
    <script type="text/javascript">
        const conf = {
            fps: 60,
            img: [],
            width: 420 + 20,
            height: 240,
            canvas: find('#slot'),
            spinBtn: find('#spin'),
            autoBtn: find('#auto'),
            mode: find('#mode'),
            where: find('#where'),
            what: find('#what'),
            balance: find('#balance'),
            bet: find('#bet'),
            win: find('#cwin'),
            checkout: find('#checkout'),
            reel: {
                width: 140,
                height: 120,
                xOffsets: [0, 140, 280].map((x) => x + 10),
                animTimes: [20, 25, 30].map((x) => x * 100),
            },
            pSkip: 40,
            imgMap: ['BAR', '2xBAR', '3xBAR', '7', 'Cherry'],
            imgStartPts: [...range(-2, 2)],
            player: {
                money: 10,
            },
            imgDot: null,
            autoModeDelay: 3000,
            sound: {
                win: new Audio('{{ asset('simple/sound/win.mp3') }}'),
                spin: new Audio('{{ asset('simple/sound/spin.mp3') }}'),
            },
        };

        //Resource loader
        Resources('{{ asset('simple/img/BAR.png') }}', '{{ asset('simple/img/2xBAR.png') }}', '{{ asset('simple/img/3xBAR.png') }}', '{{ asset('simple/img/7.png') }}', '{{ asset('simple/img/Cherry.png') }}').onLoad(
            function(resources, names) {
                //loading done and ready to go
                //save loaded resources to conf.img
                if (resources instanceof Array) {
                    conf.imgMap.forEach((i, j) => (conf.img[i] = resources[j]));
                }
                //add options to select
                names.forEach(function(name) {
                    const key = name.replace(new RegExp('^({{ asset('simple/img/') }})|(.png|.jpg|.jpeg)$', 'ig'), '');
                    const option = document.createElement('option');
                    option.value = key;
                    option.innerText = key;
                    conf.what.appendChild(option);
                });

                //sounds load
                conf.sound.win.load();
                conf.sound.spin.load();

                //instantiation the game
                (function(slot) {
                    let fps = conf.fps,
                        interval = 1000 / fps,
                        delta,
                        lastpUpdate = 0;

                    //bind click events
                    conf.spinBtn.onclick = slot.spin;
                    conf.checkout.onclick = slot.checkout;
                    conf.mode.onchange = slot.setMode;
                    conf.where.onchange = slot.setMode;
                    conf.what.onchange = slot.setMode;
                    conf.balance.onchange = slot.setCredits;
                    conf.balance.value = conf.player.money;
                    conf.autoBtn.onclick = slot.autoToggle;

                    //init game
                    slot.start();
                    //core function of the game
                    (function update(now) {
                        delta = now - lastpUpdate;
                        if (delta > interval) {
                            lastpUpdate = now - (delta % interval);
                            slot.loop(now);
                        }
                        window.requestAnimationFrame(update);
                    })();
                })(new Slot(conf.canvas.getContext('2d')));
            },
        );
    </script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" i></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
