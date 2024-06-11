<div class="fixed w-full h-screen -z-10">
    <div id="my-grid" class="flex w-auto h-full justify-between gap-5 mx-5">
        <div class="relative z-50 w-32 h-full bg-red opacity-15 hidden sm:block"></div>
        <div class="relative z-50 w-32 h-full bg-red opacity-15 hidden sm:block"></div>
        <div class="relative z-50 w-32 h-full bg-red opacity-15 hidden sm:block"></div>
        <div class="relative z-50 w-32 h-full bg-red opacity-15 hidden sm:block"></div>
        <div class="relative z-50 w-32 h-full bg-red opacity-15 hidden sm:block"></div>
        <div class="relative z-50 w-32 h-full bg-red opacity-15 hidden sm:block"></div>
        <div class="relative z-50 w-32 h-full bg-red opacity-15 hidden lg:block"></div>
        <div class="relative z-50 w-32 h-full bg-red opacity-15 hidden lg:block"></div>
    </div>
</div>


<script>
    // Command B pour afficher/cacher la grid
        document.addEventListener('keydown', function(event) {
            if (event.metaKey && event.key === 'b') {
                event.preventDefault(); 
                const grid = document.getElementById('my-grid');
                grid.classList.toggle('hidden');
            }
        });
    </script>