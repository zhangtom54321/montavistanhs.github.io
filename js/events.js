$(document).ready(function(){

  var eventsRef = firebase.database().ref().child("events/");
  eventsRef.once("value", function(snapshot) {
    snapshot.forEach(function(child) {
      var eventName = child.key;
      firebase.database().ref("events/" + eventName + "/date").once("value").then(function(snapshot) {
        var date = snapshot.val();
        firebase.database().ref("events/" + eventName + "/description").once("value").then(function(snapshot) {
          var description = snapshot.val();
          firebase.database().ref("events/" + eventName + "/hours").once("value").then(function(snapshot) {
            var hours = snapshot.val();
            firebase.database().ref("events/" + eventName + "/location").once("value").then(function(snapshot) {
              var location = snapshot.val();
              firebase.database().ref("events/" + eventName + "/picture").once("value").then(function(snapshot) {
                var picture = snapshot.val();
                firebase.database().ref("events/" + eventName + "/time").once("value").then(function(snapshot) {
                  var time = snapshot.val();
                  // Show which members are going
                  var membersRef = firebase.database().ref().child("events/"+eventName+"/members");
                  var memberList = "";
                  membersRef.once("value", function(snapshot) {
                    snapshot.forEach(function(child) {
                      if (child.val() == true) {
                        memberList = memberList + "<br>" + child.key;
                      }
                    });
                    var eventInfo = "<b>About this event:</b> " + description + "<br><br><b>Date:</b> " + date + "<br><br><b>Time:</b> " + time + "<br><br><b>Volunteer Hours:</b> " + hours + "<br><br><b>Location:</b> " + location + "<br><br><b>Members going:</b> " + memberList;

                    $("#appendEvents").append("<div class=\"row\"><div class=\"col-md-7\"><img class=\"img-fluid rounded mb-3 mb-md-0\" src=\"" + picture + "\" alt=\"Loading image...\"> </div><div class=\"col-md-5\"><h3>" + eventName + "</h3> <p>" + eventInfo + "</p> <a class=\"btn btn-primary\" style=\"color: white\" onclick=\"signup('" + eventName + "')\">Sign Up for Event <span class=\"glyphicon glyphicon-chevron-right\"></span></a></div></div>");
                    $("#appendEvents").append("<hr>")

                    document.getElementById("loading").style.display = "none";
                  });
                });
              });
            });
          });
        });
      });
    })
  });
});

function signup(eventName) {
  var userId = firebase.auth().currentUser.uid;
  // Get the user's full name
  var name;
  firebase.database().ref("users/" + userId + "/name").once("value").then(function(snapshot) {
    name = snapshot.val();
    //console.log(name);
    firebase.database().ref("events/" + eventName + "/members/" + name).once("value").then(function(snapshot) {
      if (snapshot.val() == true) {
        // Member has already signed up
        //console.log("Signed up");
        window.alert("You've already signed up for " + eventName + ". Pick a different event!");
      } else {
        // Member has not signed up yet
        //console.log("Not signed up");
        // Add user's name to the list of people who signed up
        var memberRegisteredKey = firebase.database().ref().child("events/" + eventName + "/members").push().key;
        var updates = {};
        updates["/" + name] = true;
        firebase.database().ref().child("events/" + eventName + "/members").update(updates);

        // Get number of hours for event
        var eventHours;
        firebase.database().ref("events/" + eventName + "/hours").once("value").then(function(snapshot) {
          eventHours = snapshot.val();
          //
          //console.log("Event hours: " + eventHours);
          // Get user's current hours
          var userHoursRef = firebase.database().ref("users/" + userId + "/hours");
          userHoursRef.once("value").then(function(snapshot) {
            var currUserHours = snapshot.val();
            //console.log("Current hours: " + currUserHours);
            // Update user's hours after event
            var newUserHoursKey = firebase.database().ref().child("users/" + userId).push().key;
            var updates = {};
            updates["/hours"] = currUserHours + eventHours;
            firebase.database().ref().child("users/" + userId).update(updates, function(error) {
              if (error) {
                    // The write failed...
                    window.alert("Sign up unsuccessful, please try again.");
              } else {
                    // Data saved successfully!
                    window.alert("Sign up for " + eventName + " successful!");
                    location.reload();
              }
            });
          });

        });
      }
    });
  });
}
