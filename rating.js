function submitReview() {
    const rating = document.getElementById('rating');
    const review = document.getElementById('review');
    const thankYouMessage = document.getElementById('thank-you-message');

    if (rating.value && review.value.trim() !== '') {
        thankYouMessage.style.display = 'block';
        document.getElementById('submit-button').disabled = true;
    } else {
        alert('Please select a rating and write a review before submitting.');
    }
}