// find uuid
const cookieValue = document.cookie
  .split('; ')
  .find(row => row.startsWith('user_uuid='))
  .split('=')[1];

const userUUID = cookieValue;

// find machineid
const cookieValue2 = document.cookie
  .split('; ')
  .find(row => row.startsWith('machine_id='))
  .split('=')[1];

const machineID = cookieValue2;

function apiRequest(command) {
    var settings = {
        "url": "https://api.netclaw.com.au/api",
        "method": "POST",
        "timeout": 0,
        "headers": {
          "Content-Type": "application/json"
        },
        "data": JSON.stringify({
          "direction": command,
          "machineID": machineID,
          "userID": userUUID
        }),
      };
      
    $.ajax(settings).done(function (response) {
    console.log(response);
    if (response == "Unauthorised") {
        var toastLiveExample = document.getElementById('permission-toast');
        var toast = new bootstrap.Toast(toastLiveExample);
        toast.show()
    }
    else if (response == "Error") {
        var toastLiveExample = document.getElementById('error-toast');
        var toast = new bootstrap.Toast(toastLiveExample);
        toast.show()
    } 
    })
}

