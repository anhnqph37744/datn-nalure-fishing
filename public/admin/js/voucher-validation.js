document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('.voucher-form');
    if (!form) return;

    const showError = (element, message) => {
        let errorDiv = element.nextElementSibling;
        if (errorDiv && errorDiv.classList.contains('text-danger')) {
            errorDiv.textContent = message;
        } else {
            errorDiv = document.createElement('div');
            errorDiv.className = 'text-danger';
            errorDiv.textContent = message;
            element.parentNode.insertBefore(errorDiv, element.nextSibling);
        }
    };

    const removeError = (element) => {
        const errorDiv = element.nextElementSibling;
        if (errorDiv && errorDiv.classList.contains('text-danger')) {
            errorDiv.remove();
        }
    };

    const validateForm = () => {
        let isValid = true;

        // Validate mã voucher
        const code = form.querySelector('#code');
        if (!code.value.trim()) {
            showError(code, 'Vui lòng nhập mã voucher');
            isValid = false;
        } else if (code.value.length > 50) {
            showError(code, 'Mã voucher không được vượt quá 50 ký tự');
            isValid = false;
        }

        // Validate tiêu đề
        const title = form.querySelector('#title');
        if (!title.value.trim()) {
            showError(title, 'Vui lòng nhập tiêu đề voucher');
            isValid = false;
        } else if (title.value.length > 255) {
            showError(title, 'Tiêu đề không được vượt quá 255 ký tự');
            isValid = false;
        }

        // Validate giá trị voucher
        const value = form.querySelector('#value');
        if (!value.value.trim()) {
            showError(value, 'Vui lòng nhập giá trị voucher');
            isValid = false;
        } else if (isNaN(value.value) || parseFloat(value.value) < 0) {
            showError(value, 'Giá trị voucher phải là số và lớn hơn 0');
            isValid = false;
        }

        // Validate giá trị đơn hàng tối thiểu
        const minOrderValue = form.querySelector('#min_order_value');
        if (minOrderValue.value && (isNaN(minOrderValue.value) || parseFloat(minOrderValue.value) < 0)) {
            showError(minOrderValue, 'Giá trị đơn hàng tối thiểu phải là số và lớn hơn 0');
            isValid = false;
        }

        // Validate giảm giá tối đa
        const maxDiscountValue = form.querySelector('#max_discount_value');
        if (maxDiscountValue.value && (isNaN(maxDiscountValue.value) || parseFloat(maxDiscountValue.value) < 0)) {
            showError(maxDiscountValue, 'Giá trị giảm tối đa phải là số và lớn hơn 0');
            isValid = false;
        }

        // Validate ngày
        const startDate = form.querySelector('#start_date');
        const endDate = form.querySelector('#end_date');
        const today = new Date();
        today.setHours(0, 0, 0, 0);

        if (!startDate.value) {
            showError(startDate, 'Vui lòng chọn ngày bắt đầu');
            isValid = false;
        } else if (new Date(startDate.value) < today) {
            showError(startDate, 'Ngày bắt đầu phải từ ngày hiện tại trở đi');
            isValid = false;
        }

        if (!endDate.value) {
            showError(endDate, 'Vui lòng chọn ngày kết thúc');
            isValid = false;
        } else if (startDate.value && new Date(endDate.value) <= new Date(startDate.value)) {
            showError(endDate, 'Ngày kết thúc phải sau ngày bắt đầu');
            isValid = false;
        }

        // Validate giới hạn
        const limit = form.querySelector('#limit');
        if (!limit.value.trim()) {
            showError(limit, 'Vui lòng nhập giới hạn sử dụng');
            isValid = false;
        } else if (!Number.isInteger(Number(limit.value)) || Number(limit.value) < 1) {
            showError(limit, 'Giới hạn sử dụng phải là số nguyên và lớn hơn 0');
            isValid = false;
        }

        return isValid;
    };

    // Xóa thông báo lỗi khi người dùng thay đổi giá trị
    form.querySelectorAll('input, select').forEach(element => {
        element.addEventListener('input', function() {
            removeError(this);
        });
    });

    // Validate form trước khi submit
    form.addEventListener('submit', function(e) {
        if (!validateForm()) {
            e.preventDefault();
        }
    });
});