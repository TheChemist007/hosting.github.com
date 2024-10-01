function convertString() {
    const input1 = document.getElementById("input1").value;
    const input2 = document.getElementById("input2");

    // Validate input (e.g., check if it's a valid integer)
    if (isValidInteger(input1)) {
        const intValue = parseInt(input1);
        input2.value = intValue;
    } else {
        alert("Please enter a valid integer.");
    }
}

function isValidInteger(value) {
    // Implement your integer validation logic here
    // For example, you could use a regular expression or check if the value can be parsed without errors
    return !isNaN(parseInt(value)) && value !== "";
}

function show(){
    document.getElementById('div').style.display='block'
}

function hide(){
    document.getElementById('div').style.display='none'
}