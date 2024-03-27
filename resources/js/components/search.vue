<template>
    <div class="d-flex flex-column">
        <form  class="me-2">
            <button class="btn btn-sm btn-link" 
            type="button" data-bs-toggle="offcanvas"
            data-bs-target="#searchcanvas"
            aria-controls="searchcanvas">
            <div class="input-group">
    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
    <div class="input-group-append">
        <span class="input-group-text" style="background-color: white;">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16" style="color: black;">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </span>
    </div>
</div>


            </button>
        </form>
    </div>
</template>