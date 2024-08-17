window.addEventListener('beforeunload', function() {
    // Lưu vị trí cuộn hiện tại vào sessionStorage
    sessionStorage.setItem('scrollPosition', window.scrollY);
});

window.addEventListener('load', function() {
    // Lấy vị trí cuộn từ sessionStorage
    const scrollPosition = sessionStorage.getItem('scrollPosition');
    
    // Nếu tồn tại vị trí cuộn, thì cuộn đến vị trí đó
    if (scrollPosition) {
        window.scrollTo(0, scrollPosition);
    }
});
