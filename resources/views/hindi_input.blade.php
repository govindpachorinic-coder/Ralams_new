<!DOCTYPE html>
<html>
<head>
    <title>English to Hindi Transliteration</title>
    <script src="https://cdn.jsdelivr.net/npm/@indic-transliteration/sanscript@1.2.8/sanscript.min.js"></script>
</head>
<body>
    <h4>Type in English (It will convert to Hindi):</h4>
    <input type="text" id="en_input" style="width:400px;">
    <div>
        <label>Hindi Output:</label>
        <div id="hi_output" style="min-height:40px; border:1px solid #ccc; padding:5px;"></div>
    </div>

<script>
window.onload = function() {
    var Sanscript = window.Sanscript;

    function transliterate(text) {
        return Sanscript.t(text, 'itrans', 'devanagari');
    }

    document.getElementById('en_input').addEventListener('input', function(e) {
        var enText = e.target.value;
        var hiText = transliterate(enText);
        document.getElementById('hi_output').textContent = hiText;
    });
};
</script>
</body>
</html>
