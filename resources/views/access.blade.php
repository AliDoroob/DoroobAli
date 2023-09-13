

<style>
    .full-screen-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7); /* Semi-transparent background color */
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999; /* Make sure it's above other content */
    color: #fff; /* Text color */
    font-size: 24px; /* Adjust font size as needed */
}

</style>
@if(session('error'))
<div class="full-screen-overlay">
    <div>
        {{ session('error') }}
    </div>
</div>
@endif

