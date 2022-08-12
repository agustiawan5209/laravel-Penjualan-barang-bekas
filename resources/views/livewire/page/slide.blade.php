<main class="md:min-h-screen min-h-max bg-black text-white flex items-center justify-center" x-data="carouselFilter()">
    <div class="container grid grid-cols-1">
        <div class="flex py-12 justify-center">
            <a class="px-2 text-lg uppercase font-bold tracking-widest hover:text-white"
                :class="{ 'text-gray-800': active != 0 }" href="#" @click.prevent="changeActive(0)">Fruit</a>
        </div>

        <div class="row-start-2 col-start-1" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform scale-90"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-90">
            <div class="grid grid-cols-1 grid-rows-1" x-data="carousel()" x-init="init()">
                <div class="col-start-1 row-start-1 relative z-20 flex items-center justify-center pointer-events-none">

                    <h1 class="absolute text-5xl uppercase font-black tracking-widest" x-show="active == 0"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform translate-y-12"
                        x-transition:enter-end="opacity-100 transform translate-y-0"
                        x-transition:leave="transition ease-out duration-300"
                        x-transition:leave-start="opacity-100 transform translate-y-0"
                        x-transition:leave-end="opacity-0 transform -translate-y-12">Text</h1>
                    <h1 class="absolute text-5xl uppercase font-black tracking-widest" x-show="active == 1"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform translate-y-12"
                        x-transition:enter-end="opacity-100 transform translate-y-0"
                        x-transition:leave="transition ease-out duration-300"
                        x-transition:leave-start="opacity-100 transform translate-y-0"
                        x-transition:leave-end="opacity-0 transform -translate-y-12">Avocado</h1>
                    <h1 class="absolute text-5xl uppercase font-black tracking-widest" x-show="active == 2"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform translate-y-12"
                        x-transition:enter-end="opacity-100 transform translate-y-0"
                        x-transition:leave="transition ease-out duration-300"
                        x-transition:leave-start="opacity-100 transform translate-y-0"
                        x-transition:leave-end="opacity-0 transform -translate-y-12">Mango</h1>
                    <h1 class="absolute text-5xl uppercase font-black tracking-widest" x-show="active == 3"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform translate-y-12"
                        x-transition:enter-end="opacity-100 transform translate-y-0"
                        x-transition:leave="transition ease-out duration-300"
                        x-transition:leave-start="opacity-100 transform translate-y-0"
                        x-transition:leave-end="opacity-0 transform -translate-y-12">Orange</h1>
                </div>


                <div class="carousel col-start-1 row-start-1" x-ref="carousel">
                    <div class="w-3/5 px-2">
                        <img src="https://images.unsplash.com/photo-1581375221876-8f287f7cd2cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=770&q=80"
                            loading="lazy">
                    </div>
                    <div class="w-3/5 px-2">
                        <img src="https://images.unsplash.com/photo-1581375279144-bb3b381c7046?ixlib=rb-1.2.1&auto=format&fit=crop&w=770&q=80"
                            loading="lazy">
                    </div>
                    <div class="w-3/5 px-2">
                        <img src="https://images.unsplash.com/photo-1581375303816-4a17124934f7?ixlib=rb-1.2.1&auto=format&fit=crop&w=770&q=80"
                            loading="lazy">
                    </div>
                    <div class="w-3/5 px-2">
                        <img src="https://images.unsplash.com/photo-1494253109108-2e30c049369b?ixlib=rb-1.2.1&auto=format&fit=crop&w=770&q=80"
                            loading="lazy">
                    </div>
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
