@if ($slide->count() > 0)
    <main class="md:min-h-screen min-h-max bg-black text-white flex items-center justify-center" x-data="carouselFilter()">
        <div class="container grid grid-cols-1  wow slideInLeft">


            <div class="row-start-2 col-start-1" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform scale-90"
                x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 transform scale-90">
                <div class="grid grid-cols-1 grid-rows-1" x-data="carousel()" x-init="init()">
                    @php
                        $slide_des = 0;
                        $slide_img = 0;
                    @endphp
                    <div
                        class="col-start-1 row-start-1 relative z-20 flex items-center justify-center pointer-events-none">
                        @foreach ($slide as $item)
                            <h1 class="absolute text-5xl uppercase font-black tracking-widest"
                                x-show="active == {{ $slide_des++ }}"
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 transform translate-y-12"
                                x-transition:enter-end="opacity-100 transform translate-y-0"
                                x-transition:leave="transition ease-out duration-300"
                                x-transition:leave-start="opacity-100 transform translate-y-0"
                                x-transition:leave-end="opacity-0 transform -translate-y-12">{{ $item->deskripsi }}</h1>
                        @endforeach
                    </div>


                    <div class="carousel col-start-1 row-start-1" x-ref="carousel">
                        @foreach ($slide as $item)
                            <div class="w-3/5 px-2">
                                <img src="{{ asset('upload/' . $item->thumbnail) }}" loading="lazy">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
        <script>
            function carousel() {
                return {
                    active: 0,
                    init() {
                        var flkty = new Flickity(this.$refs.carousel, {
                            wrapAround: true
                        });
                        flkty.on('change', i => this.active = i);
                    }
                }
            }

            function carouselFilter() {
                return {
                    active: 0,
                    changeActive(i) {
                        this.active = i;

                        this.$nextTick(() => {
                            let flkty = Flickity.data(this.$el.querySelectorAll('.carousel')[i]);
                            flkty.resize();

                            console.log(flkty);
                        });
                    }
                }
            }
        </script>
    </main>

@endif
