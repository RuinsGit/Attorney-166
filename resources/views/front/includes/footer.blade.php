<footer class="p-lr">
        <div class="footer-container">
            <div class="footer-top">
                <div class="footer-socials">
                    @foreach($socialMediaFooter as $social)
                        <a href="{{ $social->link }}" class="footer-social-item">
                            <img src="{{ asset('./'.$social->image) }}" alt="{{ $social->link }}">
                        </a>
                    @endforeach
                </div>
                <div class="footer-subsCribe">
                    <input type="email" id="subscribeEmail" placeholder="{{ $translations->where('key', 'for_subscribe_add_email')->first()->value }}">
                    <button class="subscribe-btn" onclick="submitSubscribe()">{{ $translations->where('key', 'subscribe_send')->first()->value }}</button>
                    <div id="subscribeMessage" style="position: absolute; margin-top: 58px; font-size: 12px;"></div>
                </div>
            </div>
            <div class="footer-bottom">
                <p class="allRightReserved">Website by <a href="https://166tech.az/">166Tech</a> 2024. Bütün hüquqlar qorunur.</p>
                <div class="footer-links">
                    <a href="" class="footer-link">{{ $translations->where('key', 'privacy_policy')->first()->value }}</a>
                    <a href="" class="footer-link">{{ $translations->where('key', 'terms_conditions')->first()->value }}</a>
                </div>
            </div>
        </div>
    </footer>

<script>
function submitSubscribe() {
    const email = document.getElementById('subscribeEmail').value;
    
    fetch('{{ route("subscribe.store") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ email: email })
    })
    .then(response => response.json())
    .then(data => {
        if(data.success) {
            document.getElementById('subscribeMessage').innerHTML = '<span style="color: #28a745;">' + data.message + '</span>';
            document.getElementById('subscribeEmail').value = '';
        } else {
            document.getElementById('subscribeMessage').innerHTML = '<span style="color: #dc3545;">' + data.message + '</span>';
        }
    })
    .catch(error => {
        document.getElementById('subscribeMessage').innerHTML = '<span style="color: #dc3545;">Bir xəta baş verdi, zəhmət olmasa yenidən cəhd edin!</span>';
    });
}
</script>