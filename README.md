# Workspace Module
## Simple workspace management
```mermaid
graph TD;
    Workspace-->Tags;
    Workspace-->Participants;
```
###Workspace Actions
```mermaid
graph TD;
    Workspace-->Create;
    Workspace-->Update;
    Workspace-->Delete;
    Workspace-->Tags;
    Tags-->TagsAdd[add];
    Tags-->TagsDel[del];
    Workspace-->Participants;
    Participants-->ParticipantAdd[add];
    Participants-->ParticipantDel[del];    
```
