# Workspace Module
## Simple management of the workspaces
```mermaid
graph TD;
    Workspace-->Tags;
    Workspace-->Projects;
    Workspace-->Links;
    Workspace-->Posts;
    Workspace-->Participants;
```
###Workspace Actions
```mermaid
graph TD;
    Workspace-->Create;
    Workspace-->Update;
    Workspace-->Delete;
    Workspace-->Relationship;
    Relationship-->Tags;
    Tags-->TagsAdd[add];
    Tags-->TagsRemove[remove];
    Relationship-->Links;
    Link-->LinkAdd[add];
    Link-->RemoveLink[remove];
    Relationship-->Posts;
    Post-->AddPost[add];
    Post-->RemovePost[remove];
    Relationship-->Projects;
    Project-->AddProject[add];
    Project-->RemoveProject[remove];
    Relationship-->Participants;
    Participant-->AddParticipant[add];
    Participant-->RemoveParticipant[remove];
    
```
