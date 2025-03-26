
var selectedAttributes = {};

$(document).ready(function() {
    $('#attribute_id').change(function() {
        var attributeId = $(this).val();
        var attributeName = $("#attribute_id option:selected").text();

        if (attributeId) {
            $.ajax({
                url: 'http://127.0.0.1:8000/dashboard/get-attribute-values/' + attributeId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data.length > 0) {
                        addAttributeSelect(attributeId, attributeName, data);
                    }
                }
            });
        }
    });

    $("#generate-variants").click(function(e) {
        e.preventDefault();

        generateVariants();
    });

    $(document).on("click", ".remove-variant", function() {
        if (confirm("Bạn muốn xoá biến thể này ?")) {
            $(this).closest(".variant-item").remove();
        }
    });
});

function addAttributeSelect(attributeId, attributeName, values) {
    if ($("#attribute-values-" + attributeId).length == 0) {
        var selectHtml = `
            <div class="form-group" id="attribute-values-${attributeId}">
                <label>${attributeName}</label>
                <select class="form-control attribute-values" multiple data-attribute-id="${attributeId}">
                </select>
            </div>
        `;
        $("#attribute-values-container").append(selectHtml);

        var $select = $("#attribute-values-" + attributeId + " select");
        values.forEach(function(value) {
            $select.append(`<option value="${value.id}">${value.value}</option>`);
        });

        $select.select2({
            placeholder: "Chọn giá trị",
            allowClear: true
        });

        $select.on("change", function() {
            var attributeId = $(this).data("attribute-id");
            var selectedValues = $(this).val() || [];
            selectedAttributes[attributeId] = selectedValues;
        });
    }
}

function generateVariants() {
    let allCombinations = generateCombinations(Object.values(selectedAttributes));
    let variantHtml = '';

    allCombinations.forEach(function(combination, index) {
        let combinationArray = combination.split("-");

        let selectHtml = `<div class="variant-attributes">`;
        combinationArray.forEach(valueId => {
            selectHtml +=
                `<select class="variant-select" name="variants[${index}][attribute_values][]">`;

            @foreach ($attribute_value as $attr)
                if ({{ $attr->id }} == valueId) {
                    selectHtml +=
                        `<option value="{{ $attr->id }}" selected>{{ $attr->value }}</option>`;
                } else {
                    selectHtml +=
                        `<option value="{{ $attr->id }}">{{ $attr->value }}</option>`;
                }
            @endforeach

            selectHtml += `</select>`;
        });
        selectHtml += `</div>`;

        variantHtml += `
            <div class="variant-box border p-3 mb-2 d-flex align-items-center">
                <div class="header-variant-box">
                         <div class="variant-select">
                               ${selectHtml}
                         </div>
                         <button type="button" class="btn btn-danger remove-variant ml-2">Xóa</button>
                    </div>
                <div class="flex-grow-1">
                   <div class="box-variant-image-sku">
                    <div class="image-box">
                        <label for="variant-image-${index}">Chọn ảnh</label>
                        <input type="file" name="variants[${index}][image]" id="variant-image-${index}" class="hide" hidden accept="image/*" />
                    </div>
                    <div class="sku-box">
                        <label>Mã SKU</label>
                        <input type="text" class="form-control variant-sku" name="variants[${index}][sku]" required placeholder="Nhập mã SKU">
                    </div>
                   </div>
                  <div class="box-price-quantity">
                    <div class="form-group" style="flex:1;">
                        <label>Giá</label>
                        <input type="number" class="form-control variant-price" name="variants[${index}][price]" required placeholder="Nhập giá">
                    </div>
                      <div class="form-group" style="flex:1;">
                        <label>Số lượng</label>
                        <input type="number" class="form-control variant-quantity" name="variants[${index}][quantity]" required min="1" placeholder="Nhập số lượng">
                    </div>
                  </div>
                  <div class="variant-box-input">
                      <div class="form-group mt-4">
                        <label>Cân nặng ( Không bắt buộc )</label>
                        <input type="number" class="form-control variant-weight" name="variants[${index}][weight]"  placeholder="Nhập nặng">
                    </div>
                    <div class="form-group mt-4">
                        <label>Mô tả biến thể</label>
                        <textarea class="form-control variant-description" name="variants[${index}][description]" id="editor">
                        </textarea>
                    </div>
                    </div>

                </div>
            </div>
        `;
    });

    $("#variants-container").html(variantHtml);
}

function generateCombinations(arrays, prefix = []) {
    if (!arrays.length) return [prefix.join("-")];

    let result = [];
    let firstArray = arrays[0];
    let remainingArrays = arrays.slice(1);

    firstArray.forEach(function(value) {
        result = result.concat(generateCombinations(remainingArrays, [...prefix, value]));
    });

    return result;
}

